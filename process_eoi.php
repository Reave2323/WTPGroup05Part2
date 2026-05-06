<?php
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$reference_number = $_POST["Reference_Number"];
$fname = $_POST["First_Name"];
$lname = $_POST["Last_Name"];
$dob = $_POST["DateOfBirth"];
$email = $_POST["Email_Address"];
$phone = $_POST["Phone_Number"];
$gender = $_POST["Gender"];
$address = implode(", ", $_POST["Address"]);
$state = $_POST["State"];
$skills = implode(", ", $_POST["Skills"]);
$other_skills = $_POST["Other_Skills"]; //THIS IS BROKEN IDK WHY FIX LATER


$sql = "INSERT INTO Eoi (reference_number, fname, lname, dob, email, phone, gender, addr, country_state, skills, other_skills)
VALUES ('$reference_number', '$fname', '$lname', '$dob', '$email', '$phone', '$gender', '$address', '$state', '$skills', '$other_skills')
";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>