<?php
class dbConnect {

    protected  static  $_obj;
    protected $_query;
    public $error;

    public function __construct() {
        if (!mysql_connect(DBHOST, DBLOGIN, DBPASS)) {
            $this->error = 'MySQL connect Error!';
        } else {
            if (!mysql_select_db(DBNAME)) {
                $this->error = 'MySQL select DB Error!';
            }else{
				mysql_query ("set character_set_client='utf8'");
				mysql_query ("set character_set_results='utf8'");
				mysql_query ("set collation_connection='utf8_general_ci'");
			}
        }
    }

    public static function getInstance(){
        if(null == self::$_obj){
            self::$_obj = new dbConnect();
        }
        return self::$_obj;
    }

    public function mysqlQuery($query) {
        $this->_query = mysql_query($query) or $this->error = mysql_error();
    }

    public function mysqlNumRows() {
        return mysql_num_rows($this->_query);
    }

    public function mysqlFetchAssoc() {
        while($a = mysql_fetch_assoc($this->_query)){
            $arr[] = $a;
        }
        return $arr;
    }

    public function getQuery() {
        return $this->_query;
    }
    public function mysqlResult($numberOfRow){
        return mysql_result($this->_query,$numberOfRow);
    }

}
