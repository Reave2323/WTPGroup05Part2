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

$query = "SELECT * FROM eoi ORDER BY post_date DESC";
$applications = mysqli_query($conn, $query);

// Separate applications by status
$pending = [];
$accepted = [];
$rejected = [];

while ($row = mysqli_fetch_assoc($applications)) {
    $jobQuery = "SELECT job_name FROM jobslisting WHERE reference_number = " . $row['reference_number'];
    $jobResult = mysqli_query($conn, $jobQuery);
    $job = mysqli_fetch_assoc($jobResult);
    $row['job_name'] = $job ? $job['job_name'] : 'Unknown';

    if ($row['Status'] == 1)
        $pending[] = $row;
    else if ($row['Status'] == 2)
        $accepted[] = $row;
    else if ($row['Status'] == 3)
        $rejected[] = $row;
}

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

            <div class="status-section">
                <h2 class="section-heading pending-heading">Pending (<?php echo count($pending); ?>)</h2>
                <div class="applications-container">
                    <?php foreach ($pending as $row): ?>
                        <div class="application-card pending">
                            <h2>Name: <?php echo htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']); ?>
                            </h2>
                            <p><strong>Applied for:</strong> <?php echo htmlspecialchars($row['job_name']); ?></p>
                            <p><?php echo htmlspecialchars($row['email']); ?></p>
                            <p><?php echo htmlspecialchars($row['phone']); ?></p>
                            <p><?php echo htmlspecialchars($row['dob']); ?></p>
                            <p><?php echo htmlspecialchars($row['gender']); ?></p>
                            <p><?php echo htmlspecialchars($row['address']); ?></p>
                            <p><?php echo htmlspecialchars($row['state']); ?></p>
                            <p><?php echo htmlspecialchars($row['skills']); ?></p>
                            <p><?php echo htmlspecialchars($row['other_skills']); ?></p>
                            <p><?php echo htmlspecialchars($row['post_date']); ?></p>
                            <p class="status-pending">Status: Pending</p>
                            <form method="post" action="manage.php">
                                <input type="hidden" name="edit-id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="action" value="accept">Accept</button>
                                <button type="submit" name="action" value="reject">Reject</button>
                                <button type="submit" name="action" value="delete">Delete</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                    <?php if (empty($pending)): ?>
                        <p class="no-applications">No pending applications.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="status-section">
                <!-- Each section outlines the display for each type of application status -->
                <!-- Two classes are used for styling, one for style of all sections, one for specific section -->
                <h2 class="section-heading accepted-heading">Accepted (<?php echo count($accepted); ?>)</h2>
                <div class="applications-container">
                    <?php foreach ($accepted as $row): ?>
                        <div class="application-card accepted">
                            <h2>Name: <?php echo htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']); ?>
                            </h2>
                            <p><strong>Applied for:</strong> <?php echo htmlspecialchars($row['job_name']); ?></p>
                            <p><?php echo htmlspecialchars($row['email']); ?></p>
                            <p><?php echo htmlspecialchars($row['phone']); ?></p>
                            <p><?php echo htmlspecialchars($row['address']); ?></p>
                            <p><?php echo htmlspecialchars($row['state']); ?></p>
                            <p class="status-accepted">Status: Accepted</p>
                            <form method="post" action="manage.php">
                                <input type="hidden" name="edit-id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="action" value="pending">Pending</button>
                                <button type="submit" name="action" value="reject">Reject</button>
                                <button type="submit" name="action" value="delete">Delete</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                    <!-- If there are not applications of a certain status, a message is displayed to indicate this -->
                    <?php if (empty($accepted)): ?>
                        <p class="no-applications">No accepted applications.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="status-section">
                <h2 class="section-heading rejected-heading">Rejected (<?php echo count($rejected); ?>)</h2>
                <div class="applications-container">
                    <?php foreach ($rejected as $row): ?>
                        <div class="application-card rejected">
                            <h2>Name: <?php echo htmlspecialchars($row['fname']) . " " . htmlspecialchars($row['lname']); ?>
                            </h2>
                            <p><strong>Applied for:</strong> <?php echo htmlspecialchars($row['job_name']); ?></p>
                            <p><?php echo htmlspecialchars($row['email']); ?></p>
                            <p><?php echo htmlspecialchars($row['phone']); ?></p>
                            <p class="status-rejected">Status: Rejected</p>
                            <form method="post" action="manage.php">
                                <input type="hidden" name="edit-id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="action" value="accept">Accept</button>
                                <button type="submit" name="action" value="pending">Pending</button>
                                <button type="submit" name="action" value="delete">Delete</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                    <?php if (empty($rejected)): ?>
                        <p class="no-applications">No rejected applications.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>