<?php

class Model_Portfolio extends Model{
    public function get_data(){
        $dbconnect = dbConnect::getInstance();
        if(!$dbconnect->error){
            $dbconnect->mysqlQuery("SELECT `email`,`date` FROM `users`");
            while($result = $dbconnect->mysqlFetchAssoc()){
                $data[] = $result;
            }
        }else{
            die($dbconnect->error);
        }
        return $data;
    }
}
