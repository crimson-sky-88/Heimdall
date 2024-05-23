<?php 

    // MYSQL
    function mysqlConn(){
        $mysqlConn = new mysqli("localhost", "root", "", "");                           // CHANGE FOR WEB HOSTING
        
        return $mysqlConn;
    }
        
?>