<?php 

    class Base{
        
        private $dbh;
        private $stmt;
        private $error;
        private $host=DB_HOST;
        private $user=DB_USER;
        private $pass=DB_PASSWORD;
        private $dbName=DB_DATABASE;

        function __construct(){
            try{
                $this->dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->user,$this->pass);
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                $this->error=$e->getMessage();
                echo $this->error;
            }
        }

        public function query($SQL){
            $this->stmt=$this->dbh->prepare($SQL);
        }

        public function bind($param, $value, $type=NULL){
            if(is_null($type)){
                switch (true) {
                    case is_int($value):
                        $type=PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type=PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type=PDO::PARAM_NULL;
                        break;
                    default:
                        $type=PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute(){
            return $this->stmt->execute();
        }

        public function getRows(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);            
        }

        public function getRow(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }