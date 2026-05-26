<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include_once("settings_admin.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM jobslisting";
$jobs = mysqli_query($conn, $query);

$query = "SELECT * FROM Eoi";
$applications = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Portal</title>

    <link rel="stylesheet" href="style/manage.css">
</head>

<body>
    <div class="content-area">
        <div class="manager-portal">
            <h1>Manager Portal</h1>
            <p>Welcome to the manager portal. Here you can manage job listings and view applications.</p>
            <div class="manager-list">
                <ul class="manager-links">
                    <li><a href="manage_jobs.php">Manage Job Listings</a></li>
                    <li><a href="applications.php">View Applications</a></li>
                </ul>
            </div>

            <details>
                <summary>Manage Job Listings</summary>
                <?php
                while ($row = mysqli_fetch_assoc($jobs)) {
                    echo "<div class='job-listing'>";
                    echo "<h2>" . htmlspecialchars($row['job_name']) . "</h2>";
                    echo "<p>" . htmlspecialchars($row['job_description']) . "</p>";
                    echo "</div>";
                }
                ?>
            </details>
            <details>
                <summary>View Applications</summary>
                <p>Here you can view all applications submitted by candidates. (This section is under construction.)</p>
                <?php
                while ($row = mysqli_fetch_assoc($applications)) {
                    echo "<div class='job-listing'>";
                    echo "<h2>" . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</h2>";
                    echo "<p>" . htmlspecialchars($row['email']) . "</p>";
                    echo "</div>";
                }
                ?>
            </details>
        </div>
    </div>
</body>

</html>