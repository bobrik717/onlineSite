<?php
class Model_Users extends Model{
    public function setUser($email,$pass,$date){
        $dbconnect = dbConnect::getInstance();
        $dbconnect->mysqlQuery(" INSERT INTO `users`(`email`, `password`, `date`) VALUES ('".$email."','".$pass."','".$date."') ");
        if($dbconnect->error === null){
            return false;
        }else{
            return $dbconnect->error;
        }
    }
    public function userLogin($email,$password){
        $dbconnect = dbConnect::getInstance();
        $pass = md5($email.$password);
        $dbconnect->mysqlQuery(" SELECT `id` FROM `users` WHERE `email` = '".$email."' AND `password` = '".$pass."' ");
        return $dbconnect->mysqlFetchAssoc();
    }
    public function getUser($email){
        $dbconnect = dbConnect::getInstance();
        $dbconnect->mysqlQuery(" SELECT * FROM `users` WHERE `email` = '".$email."' ");
        return $dbconnect->mysqlNumRows();
    }
    public function setNotes($user_id,$title,$text){
        $dbconnect = dbConnect::getInstance();
        $dbconnect->mysqlQuery(" INSERT INTO `notebook`(`user_id`, `title`, `text`) VALUES ('".$user_id."','".$title."','".$text."') ");
        return $dbconnect->error;
    }
    public function getNotes($user_id){
        $dbconnect = dbConnect::getInstance();
        $dbconnect->mysqlQuery(" SELECT `id`, `title`, `text`, `date` FROM `notebook` WHERE `user_id` = '".$user_id."' AND `done` = '0' ");
        return $dbconnect->mysqlFetchAssoc();
    }
    public function checkNotes($note_ids){
        $dbconnect = dbConnect::getInstance();
        foreach($note_ids as $note_id){
            $dbconnect->mysqlQuery(" UPDATE `notebook` SET `done`= '1' WHERE `id` = '" .$note_id. "' ");
        }
        return $dbconnect->error;
    }
}
