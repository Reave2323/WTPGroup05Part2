<?php
$host = "localhost";
$user = "fake_shop_admin"; //ask Moss if you need help configuring locally
$pwd = "";
$sql_db = "jobs_database";

//This is the connection to the database, we will use this in all queries coming out of the management portal
//As it has increased permissions, we want ensure that only privelaged users have access certain SQL commands,
//Through user accounts in phpmyadmin.