<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "warehouse";
$koneksi    = mysql_connect($host,$user,$pass);
     
    if(!$koneksi){
        die("Cannot connect to database.");
    }
     
    mysql_select_db($db);
?>