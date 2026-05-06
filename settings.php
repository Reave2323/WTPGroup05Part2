<?php
    require_once"settings.php";
    $dbconn = mysql_connect("localhost", "userconn", "", "jobs_database");
    if (!$conn){
        die("Connection failed:" .mysql_connect_error());
    }
?>