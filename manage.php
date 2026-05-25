<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Portal</title>
</head>

<body>
    <h1>Manager Portal</h1>
    <p>Welcome to the manager portal. Here you can manage job listings and view applications.</p>
    <ul>
        <li><a href="manage_jobs.php">Manage Job Listings</a></li>
        <li><a href="applications.php">View Applications</a></li>
    </ul>
</body>

</html>