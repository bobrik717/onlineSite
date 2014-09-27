<?php
class Controller_Users extends Controller{
    public function __construct(){
        $this->model = new Model_Users();
        $this->view = new View();
    }
    public function action_index(){
        $this->view->generate('register_view.php','template_view.php');
    }
    public function action_register(){
        if( isset($_POST) ){
            $data['errors'] = array();
            //print_r($_POST);
            $email = filter_input(INPUT_POST,'register_email');
            $password = filter_input(INPUT_POST,'register_password');
            $confPassword = filter_input(INPUT_POST,'register_confpassword');
            if( $password !== $confPassword ){
                $data['errors']['confpass'] = 'Passwords do not match';
                $this->view->generate('register_view.php','template_view.php',$data);
            }
        }
    }
}