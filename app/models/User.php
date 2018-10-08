<?php  

    class User{
        private $db;
        function __construct(){
            $this->db=new Base();
        }

        public function getUsers(){
            $this->db->query("SELECT * FROM users");
            return $this->db->getRows();
        }
    }