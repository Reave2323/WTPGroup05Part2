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

            <details class="jobs-list">
                <summary class="title">Manage Job Listings</summary>
                <?php
                while ($row = mysqli_fetch_assoc($jobs)) {
                    echo '<div class="job-card">
                        <section>
                            <h3>' . htmlspecialchars($row['job_name']) . '</h3>
                            <p> 💼 ' . htmlspecialchars($row['job_type']) . '</p>
                            <p><strong>Location:</strong> ' . htmlspecialchars($row['location']) . '</p>
                            <p><strong>Salary:</strong> ' . htmlspecialchars($row['salary']) . '</p>
                        </section>
                        <section>
                            <h2><strong>Key Responsibilities:</strong></h2>
                            <p>' . htmlspecialchars($row['key_responsibilities']) . '</p>
                        </section>
                        <section>
                            <h2><strong>Essential Requirements:</strong></h2>
                                <p>' . htmlspecialchars($row['essential_requirements']) . '</p>
                        </section>
                        <section>
                            <h2><strong>Preferred Requirements:</strong></h2>
                            <p>' . htmlspecialchars($row['preferred_requirements']) . '</p>
                        </section>
                        <a href="#job-edit-' . $row['reference_number'] . '" class="button-style">Edit</a>
                        <a href="#job-delete-' . $row['reference_number'] . '" class="button-style delete-button">Delete</a>
                    </div>';
                }
                while ($row = mysqli_fetch_assoc($jobs)) {
                    echo '<div id="#job-delete-' . $row['reference_number'] . '" class="job-delete">
                    <h2>Delete Job Listing</h2>
                    <p>This section is under construction.</p>
                </div>';
                }
                while ($row = mysqli_fetch_assoc($jobs)) {
                    echo '<div id="#job-edit-' . $row['reference_number'] . '" class="job-edit">';
                    echo '<div class="job-edit-card">';
                    echo '<h2>Edit Job Listing</h2>';
                    echo '<p>This section is under construction.</p>';
                    echo '<h3>' . htmlspecialchars($row['job_name']) . '</h3>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </details>

            <details class="applications-list">
                <summary class="title">View Applications</summary>
                <p>Here you can view all applications submitted by candidates. (This section is under construction.)</p>
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
                    echo "</div>";
                }
                ?>
            </details>
        </div>
    </div>
</body>

</html>