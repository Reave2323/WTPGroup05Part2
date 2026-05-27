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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['edit-id'])) {
    $id = intval($_POST['edit-id']);
    if ($_POST['action'] === 'accept') {
        $update_query = "UPDATE eoi SET Status = 2 WHERE id = $id";
        mysqli_query($conn, $update_query);
    } else if ($_POST['action'] === 'reject') {
        $update_query = "UPDATE eoi SET Status = 3 WHERE id = $id";
        mysqli_query($conn, $update_query);
    } else if ($_POST['action'] === 'delete') {
        $delete_query = "DELETE FROM eoi WHERE id = $id";
        mysqli_query($conn, $delete_query);
    } else if ($_POST['action'] === 'pending') {
        $update_query = "UPDATE eoi SET Status = 1 WHERE id = $id";
        mysqli_query($conn, $update_query);
    }
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
                    if ($row["Status"] == 1) {
                        echo "<div class='application-card pending'>";
                        echo "<div class='application-card'>";
                        echo "<h2> Name: " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</h2>";
                        $query = "SELECT job_name FROM jobslisting WHERE reference_number = " . $row['reference_number'];
                        $result = mysqli_query($conn, $query);
                        $job = mysqli_fetch_assoc($result);
                        echo "<p><strong>Applied for:</strong> " . htmlspecialchars($job['job_name']) . "</p>";
                        echo "<p>" . htmlspecialchars($row['email']) . "</p>";
                        echo "<p>" . htmlspecialchars($row['phone']) . "</p>";
                        echo "<p>" . htmlspecialchars($row["dob"]) . "</p>";
                        echo "<p>" . htmlspecialchars($row["gender"]) . "</p>";
                        echo "<p>" . htmlspecialchars($row["address"]) . "</p>";
                        echo "<p>" . htmlspecialchars($row["state"]) . "</p>";
                        echo "<p>" . htmlspecialchars($row["skills"]) . "</p>";
                        echo "<p>" . htmlspecialchars($row["other_skills"]) . "</p>";
                        echo "<p>" . htmlspecialchars($row["post_date"]) . "</p>";
                        echo "<p class='status-pending'> Status: Pending </p>";
                        echo "<form method='post' action='manage.php'>
                                <input type='hidden' name='edit-id' value='" . $row['id'] . "'>
                                <button type='submit' name='action' value='accept'>Accept</button>
                                <button type='submit' name='action' value='reject'>Reject</button>
                                <button type='submit' name='action' value='delete'>Delete</button>
                            </form>";
                        echo "</div>";
                        echo "</div>";
                    } else if ($row["Status"] == 2) {
                        echo "<div class='application-card accepted'>";
                        echo "<div class='application-card'>";
                        echo "<h2> Name: " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</h2>";
                        echo "<p>" . htmlspecialchars($row['email']) . "</p>";
                        echo "<p>" . htmlspecialchars($row['phone']) . "</p>";
                        echo "<p>" . htmlspecialchars($row["address"]) . "</p>";
                        echo "<p>" . htmlspecialchars($row["state"]) . "</p>";
                        echo "<p class='status-accepted'> Status: Accepted </p>";
                        echo "<form method='post' action='manage.php'>
                                <input type='hidden' name='edit-id' value='" . $row['id'] . "'>
                                <button type='submit' name='action' value='pending'>Pending</button>
                                <button type='submit' name='action' value='reject'>Reject</button>
                                <button type='submit' name='action' value='delete'>Delete</button>
                            </form>";
                        echo "</div>";
                        echo "</div>";
                    } else if ($row["Status"] == 3) {
                        echo "<div class='application-card rejected'>";
                        echo "<div class='application-card'>";
                        echo "<h2> Name: " . htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']) . "</h2>";
                        echo "<p>" . htmlspecialchars($row['email']) . "</p>";
                        echo "<p>" . htmlspecialchars($row['phone']) . "</p>";
                        echo "<p class='status-rejected'> Status: Rejected </p>";
                        echo "<form method='post' action='manage.php'>
                                <input type='hidden' name='edit-id' value='" . $row['id'] . "'>
                                <button type='submit' name='action' value='accept'>Accept</button>
                                <button type='submit' name='action' value='pending'>Pending</button>
                                <button type='submit' name='action' value='delete'>Delete</button>
                            </form>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>