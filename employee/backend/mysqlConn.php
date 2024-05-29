<?php 

    // MYSQL
    function mysqlCon(){
        $mysqlConn = new mysqli("localhost", "root", "", "heimdall_db");                           // CHANGE FOR WEB HOSTING

        return $mysqlConn;
    }
        
?>