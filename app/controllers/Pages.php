<?php  

    class Pages extends Controller{
        function __construct(){
            
            /*TODO: 
            ** Here we load our model that connects to the database
            ** Example: Model User from the table `users` of DB

            $this->user=$this->model('User');

            */
        }

        public function index(){ 
            
            /*TODO:
            ** Here we use the user model and call his getUsers method

            $users=$this->user->getUsers();

            */

            $data=[
                'title' =>  'Page Index',
                //'users' =>  $users    //FIXME: Adding variables to array list
            ];

            $this->view('pages/index', $data);

        }
    }
