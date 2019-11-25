<?php

class Controller_JSAPI extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_jskaretka()
    {
        if (isset($_SESSION['user']['id'])) {
            $data['crumb'] = $this->breadcrumb();
            $this->view->generate('jskaretka_view.php', 'template_view.php',$data);
        } else {
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }
    public function action_index(){
        if (isset($_SESSION['user']['id'])) {
            $data['crumb'] = $this->breadcrumb();
            $this->view->generate('jsindex_view.php', 'template_view.php',$data);
        } else {
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }
}

?>
