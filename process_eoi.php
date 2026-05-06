<?php
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
mysqli_close($conn);

$reference_number = $_POST["Reference_Number"];
$fname = $_POST["First_Name"];
$lname = $_POST["Last_Name"];
$dob = $_POST["DateOfBirth"];
$email = $_POST["Email_Address"];
$phone = $_POST["Phone_Number"];
$Gender = $_POST["Gender"];
$address[] = $_POST["Address"];
$state = $_POST["State"];
$skills[] = $_POST["Skills"];
$other_skills = $_POST["Other_Skills"];


echo "$reference_number $fname $lname $dob $email $phone $Gender";
print_r($address);
print_r($skills);
echo "$other_skills";


?>