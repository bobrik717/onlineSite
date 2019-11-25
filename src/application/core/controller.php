<?php
class Controller{
    public $model;
    public $view;

    function __construct(){
        $this->view = new View();
    }
    function action_index(){

    }
    function IsPost(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    function breadcrumb(){
        $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
        $html = '<a href="/">Main</a>->';
        for($i = 0; $i <= count($crumbs)-2; $i++){
            if($crumbs[$i] == '')
                continue;
            $html .= "<a href='/$crumbs[$i]'>$crumbs[$i]</a>->";
        }
        $c = count($crumbs)-1;
        $html .= $crumbs[$c];
        return $html;
    }
}
