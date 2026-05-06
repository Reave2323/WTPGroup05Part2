<?php
require_once("settings.php");
$conn = mysqli_connect("localhost", "root", "", "jobs_database");
if (!$conn) {
    die("Error: Failed to send EOI, please try again later" . mysqli_connect_error());
}

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