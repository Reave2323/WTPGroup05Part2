<?php
//This script will recreate tables if for some reason your local database fails. 
// Call it using an require_once statment
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed:" + mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS Eoi (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reference_number INT(5) NOT NULL,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    dob VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone INT(10) NOT NULL,
    gender VARCHAR(6) NOT NULL,
    addr VARCHAR(80) NOT NULL,
    country_state VARCHAR(15) NOT NULL,
    skills VARCHAR(100) NOT NULL,
    other_skills VARCHAR(200),
    post_date TIMESTAMP
)";

mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS Jobs(
    job_id INT AUTO_INCREMENT PRIMARY KEY,
    reference_number INT(5) NOT NULL,
    job_name VARCHAR(50) NOT NULL,
    job_type VARCHAR(50) NOT NULL,
    job_description TEXT NOT NULL,
    applicant_location  VARCHAR(50) NOT NULL,
    salary INT(6) NOT NULL,
    responsibilities TEXT NOT NULL,
    essential_req TEXT NOT NULL,
    pref_req TEXT NOT NULL,
    post_date TIMESTAMP
)";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS `users` (
  `User ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`User ID`)
)";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>