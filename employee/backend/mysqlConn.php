<?php 

    // MYSQL
    function mysqlCon(){
        $mysqlConn = new mysqli("localhost", "root", "", "heimdall_db");                           // CHANGE FOR WEB HOSTING
        
        if($mysqlConn->connect_error){
            die("Connection failed: " . $mysqlConn->connect_error);
        }else{
            echo "'Connection Success'";
        }

        return $mysqlConn;
    }
        
?>