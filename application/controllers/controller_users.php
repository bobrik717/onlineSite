<?php

class Controller_Users extends Controller
{
    public function __construct()
    {
        $this->model = new Model_Users();
        $this->view = new View();
    }

    public function action_index()
    {
        if( isset($_SESSION['user']['id']) ){
            $this->view->generate('main_view.php','template_view.php');
        }else{
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }

    public function action_register()
    {
        if ($this->IsPost()) {
            $data['errors'] = array();
            $email = filter_input(INPUT_POST, 'register_email');
            $password = filter_input(INPUT_POST, 'register_password');
            $confPassword = filter_input(INPUT_POST, 'register_confpassword');
            if ($password !== $confPassword) {
                $data['errors']['confpass'] = 'Passwords do not match';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['errors']['email'] = 'E-mail is not valid';
            }
            if( $this->model->getUser($email) > 0 ){
                $data['errors']['email'] = 'E-mail is already exist';
            }
            if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%])[0-9A-Za-z!@#$%]{8,}$/', $password)) {
                $data['errors']['pass'] = 'The password does not meet the requirements!';
            }
            if ( $data['errors'] !== array() ) {
                $this->view->generate('register_view.php', 'template_view.php', $data);
            } else {
                $passForSave = md5($email.$password);
                $date = date("d-m-Y H:i:s");
                $result = $this->model->setUser($email,$passForSave,$date);
                if(!$result){
                    $this->view->generate('login_view.php','template_view.php');
                }else{
                    $data['errors']['dbError'] = $result;
                    $this->view->generate('register_view.php', 'template_view.php', $data);
                }
            }
        }
    }
    public function action_login(){
        if( $this->IsPost() ){
            $email = filter_input(INPUT_POST,'login_email');
            $password = filter_input(INPUT_POST,'login_password');
            $result = $this->model->userLogin($email,$password);
            if($result[0]['id'] != ''){
                $_SESSION['user']['id'] = $result[0]['id'];
                $_SESSION['user']['session_id'] = session_id();
                $this->view->generate('main_view.php','template_view.php');
            }else{
                $data['error'] = 'Password or E-mail do not match';
                $this->view->generate('login_view.php','template_view.php',$data);
            }
        }
    }
    public function action_ajaxCheckEmail(){
        if($this->IsPost()){
            $email = filter_input(INPUT_POST,'email');
            if( $this->model->getUser($email) > 0 ){
                echo 'E-mail is already exist';
            }
        }
    }

    public function action_logout(){
        unset($_SESSION['user']['id']);
        unset($_SESSION['user']['session_id']);
        $this->view->generate('login_view.php','template_view.php');
    }
    public function action_notebook(){
        if( isset($_SESSION['user']['id']) ){
            $data = array();
            if( $this->IsPost() ){
                require_once(__DIR__.'/../plugins/recaptchalib.php');
                $privatekey = PRIVKEY;
                $title = filter_input(INPUT_POST,'title');
                $text = filter_input(INPUT_POST,'text');
                $resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
                if($resp->is_valid){
                    $result = $this->model->setNotes($_SESSION['user']['id'],$title,$text);
                    if( $result ){
                        $data = array(
                            'errorBD' => $result,
                            'errorCaph' => $resp->error,
                            'title' => $title,
                            'text' => $text
                        );
                    }else{
                        header('Refresh:0');
                    }
                }else{
                    $data = array(
                        'errorCaph' => $resp->error,
                        'title' => $title,
                        'text' => $text
                    );
                }
            }
            $data['notes'] = $this->model->getNotes($_SESSION['user']['id']);
            $data['crumb'] = $this->breadcrumb();
            $this->view->generate('notebook_view.php','template_view.php',$data);
        }else{
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }
    public function action_checkNOtes(){
        if( $this->IsPost() ){
            $arrOfId = filter_input(INPUT_POST,'arr', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            if(!$this->model->checkNotes($arrOfId)){
                echo 'true';
            }else{
                echo 'false';
            }
        }
    }
}
