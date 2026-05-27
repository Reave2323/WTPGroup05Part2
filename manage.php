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


$query = "SELECT * FROM eoi";
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
            <div class="header">
                <h1>Manager Portal</h1>
                <a href="logout.php" class="logout-button">Logout</a>
            </div>
            <p>Expression of Interest Applications</p>
            <div class="applications-container">
                <?php
                while ($row = mysqli_fetch_assoc($applications)) {
                    echo "<div class='application-card'>";
                    echo "<h2> Name: " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</h2>";
                    echo "<p>" . htmlspecialchars($row['email']) . "</p>";
                    echo "<p>" . htmlspecialchars($row['phone']) . "</p>";
                    echo "<p>" . htmlspecialchars($row["dob"]) . "</p>";
                    echo "<p>" . htmlspecialchars($row["gender"]) . "</p>";
                    echo "<p>" . htmlspecialchars($row["address"]) . "</p>";
                    echo "<p>" . htmlspecialchars($row["state"]) . "</p>";
                    echo "<p>" . htmlspecialchars($row["skills"]) . "</p>";
                    echo "<p>" . htmlspecialchars($row["other_skills"]) . "</p>";
                    echo "<p>" . htmlspecialchars($row["post_date"]) . "</p>";
                    if ($row["Status"] == 1) {
                        echo "<p>Status: Pending</p>";
                    } elseif ($row["Status"] == 2) {
                        echo "<p>Status: Rejected</p>";
                    } elseif ($row["Status"] == 3) {
                        echo "<p>Status: Accepted</p>";
                    } else {
                        echo "<p>Status: Unknown</p>";
                    }

                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>