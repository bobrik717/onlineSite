<?php
class Controller_Google  extends Controller{
    public function __construct(){
        $this->view = new View();
    }
    public function action_googleMaps(){
        if( isset($_SESSION['user']['id']) ){
            $data['crumb'] = $this->breadcrumb();
            $this->view->generate('googlemapsmarker_view.php','template_view.php',$data);
        }else{
            $this->view->generate('login_view.php','template_view.php');
        }
    }
    public function action_index(){
        if (isset($_SESSION['user']['id'])) {
            $data['crumb'] = $this->breadcrumb();
            $this->view->generate('googleindex_view.php', 'template_view.php',$data);
        } else {
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }
}
?>
