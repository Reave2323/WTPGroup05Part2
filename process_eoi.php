<?php
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
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
//send
if (!mysqli_query($conn, $sql)) {
    die("Query failed: " . mysqli_error($conn));
}

if (isset($_POST["First_Name"]) && isset($_POST["Last_Name"]) && isset($_POST["Email_Address"])) {

    $reference_number = htmlspecialchars(trim($_POST["Reference_Number"]));
    $fname = htmlspecialchars(trim($_POST["First_Name"]));
    $lname = htmlspecialchars(trim($_POST["Last_Name"]));
    $dob = htmlspecialchars(trim($_POST["DateOfBirth"]));
    $email = htmlspecialchars(trim(filter_var($_POST["Email_Address"], FILTER_VALIDATE_EMAIL)));
    $phone = htmlspecialchars(trim($_POST["Phone_Number"]));
    $gender = $_POST["Gender"];
    $address = htmlspecialchars(implode(", ", $_POST["Address"]));
    $state = $_POST["State"];
    $skills = implode(", ", $_POST["Skills"]);
    $other_skills = isset($_POST["Other_Skills"])
        ? htmlspecialchars(trim($_POST["Other_Skills"]))
        : "";
    //Craft SQL Query to database
    $sql = "INSERT INTO Eoi (reference_number, fname, lname, dob, email, phone, gender, addr, country_state, skills, other_skills)
    VALUES ('$reference_number', '$fname', '$lname', '$dob', '$email', '$phone', '$gender', '$address', '$state', '$skills', '$other_skills')
    ";
    //send and close connection
    if (!mysqli_query($conn, $sql)) {
        die("Query failed: " . mysqli_error($conn));
    }
    $app_id = mysqli_insert_id($conn);
    mysqli_close($conn);

    //Redirect to thank you message
    header("Location: submitted.php?name=" . urlencode($fname . " " . $lname) . "&app_id=" . $app_id);
    exit();
} else {
    header("Location: apply.php");
    exit();
}



?>