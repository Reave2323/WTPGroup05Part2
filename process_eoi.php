<?php
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

if (isset($_POST["First_Name"]) && isset($_POST["Last_Name"]) && isset($_POST["Email_Address"])) {

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
    $other_skills = isset($_POST["Other_Skills"])
        ? $_POST["Other_Skills"]
        : "";
    //Craft SQL Query to database
    $sql = "INSERT INTO Eoi (reference_number, fname, lname, dob, email, phone, gender, addr, country_state, skills, other_skills)
    VALUES ('$reference_number', '$fname', '$lname', '$dob', '$email', '$phone', '$gender', '$address', '$state', '$skills', '$other_skills')
    ";
    //send and close connection
    if (!mysqli_query($conn, $sql)) {
        die("Query failed: " . mysqli_error($conn));
    }

    mysqli_close($conn);

    //Redirect to thank you message
    header("Location: submitted.php?name=" . urlencode($fname . " " . $lname));
    exit();
} else {
    header("Location: apply.php");
    exit();
}



?>