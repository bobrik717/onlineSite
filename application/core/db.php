<?php
class dbConnect {

    protected $_query;
    public $error;

    public function __construct() {
        if (!mysql_connect(DBHOST, DBLOGIN, DBPASS)) {
            $this->error = 'MySQL connect Error!';
        } else {
            if (!mysql_select_db(DBNAME)) {
                $this->error = 'MySQL select DB Error!';
            }
        }
    }

    public function mysqlQuery($query) {
        $this->_query = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
    }

    public function mysqlNumRows() {
        return mysql_num_rows($this->_query);
    }

    public function mysqlFetchAssoc() {
        return mysql_fetch_assoc($this->_query);
    }

    public function getQuery() {
        return $this->_query;
    }
    public function mysqlResult($numberOfRow){
        return mysql_result($this->_query,$numberOfRow);
    }

}