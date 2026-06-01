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

/* The below code was enhanced by ai to allow mass deletion of applications by job or status. */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete-by-job' && isset($_POST['delete-job']) && $_POST['delete-job'] !== '') {
    $job_name = mysqli_real_escape_string($conn, $_POST['delete-job']);
    $delete_query = "DELETE eoi FROM eoi JOIN jobslisting ON eoi.reference_number = jobslisting.reference_number WHERE jobslisting.job_name = '$job_name'";
    mysqli_query($conn, $delete_query);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete-by-status' && isset($_POST['delete-status']) && $_POST['delete-status'] !== '') {
    $status = intval($_POST['delete-status']);
    $delete_query = "DELETE FROM eoi WHERE Status = $status";
    mysqli_query($conn, $delete_query);
}

$job_filter = $_GET['job'] ?? '';
$sort = $_GET['sort'] ?? '';

$sort_map = [
    'fname' => 'eoi.fname ASC',
    'lname' => 'eoi.lname ASC',
    'both' => 'eoi.fname ASC, eoi.lname ASC',
];
$order_by = isset($sort_map[$sort]) ? $sort_map[$sort] : 'eoi.post_date DESC';

$jobs_query = "SELECT DISTINCT job_name FROM jobslisting ORDER BY job_name ASC";
$jobs_result = mysqli_query($conn, $jobs_query);

if ($job_filter !== '') {
    $stmt = mysqli_prepare($conn, "SELECT eoi.* FROM eoi JOIN jobslisting ON eoi.reference_number = jobslisting.reference_number WHERE jobslisting.job_name = ? ORDER BY $order_by");
    mysqli_stmt_bind_param($stmt, 's', $job_filter);
    mysqli_stmt_execute($stmt);
    $applications = mysqli_stmt_get_result($stmt);
} else {
    $applications = mysqli_query($conn, "SELECT * FROM eoi ORDER BY $order_by");
}

/* End of ai enhancement */

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
            <!--The below code was enhanced by ai to allow mass deletion of applications by job or status. -->
            <form method="get" action="manage.php" class="filter-form">
                <label for="job-filter">Filter by Job:</label>
                <select name="job" id="job-filter">
                    <option value="">All Jobs</option>
                    <?php while ($job_row = mysqli_fetch_assoc($jobs_result)): ?>
                        <option value="<?php echo htmlspecialchars($job_row['job_name']); ?>">
                            <?php echo ($job_filter === $job_row['job_name']) ? 'selected' : ''; ?>
                            <?php echo htmlspecialchars($job_row['job_name']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <label for=" sort-filter">Sort by Name:</label>
                <select name="sort" id="sort-filter">
                    <option value="">Date (default)</option>
                    <option value="fname" <?php echo ($sort === 'fname') ? 'selected' : ''; ?>>First Name</option>
                    <option value="lname" <?php echo ($sort === 'lname') ? 'selected' : ''; ?>>Last Name</option>
                    <option value="both" <?php echo ($sort === 'both') ? 'selected' : ''; ?>>First &amp; Last Name
                    </option>
                </select>
                <button type="submit">Apply</button>
                <?php if ($job_filter !== '' || $sort !== ''): ?>
                    <a href="manage.php">Clear</a>
                <?php endif; ?>
            </form>
            <br>
            <details>
                <summary>DANGER ZONE</summary>
                <p>Use below options to mass delete applications by job or status:</p>
                <form method="post" action="manage.php">
                    <label for="delete-job">Delete by Job:</label>
                    <select name="delete-job" id="delete-job">
                        <option value="">Select Job</option>
                        <?php
                        $delete_jobs_query = "SELECT DISTINCT job_name FROM jobslisting ORDER BY job_name ASC";
                        $delete_jobs_result = mysqli_query($conn, $delete_jobs_query);
                        while ($job_row = mysqli_fetch_assoc($delete_jobs_result)) {
                            echo '<option value="' . htmlspecialchars($job_row['job_name']) . '">' . htmlspecialchars($job_row['job_name']) . '</option>';
                        }
                        ?>
                    </select>
                    <button type="submit" name="action" value="delete-by-job">Delete by Job</button>
                    <br><br>
                    <label for="delete-status">Delete by Status:</label>
                    <select name="delete-status" id="delete-status">
                        <option value="">Select Status</option>
                        <option value="1">Pending</option>
                        <option value="2">Accepted</option>
                        <option value="3">Rejected</option>
                    </select>
                    <button type="submit" name="action" value="delete-by-status">Delete by Status</button>
                </form>
            </details>
            <!-- End of AI enhacement-->
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
                            <p><?php echo "DOB: " . htmlspecialchars($row['dob']); ?></p>
                            <p><?php echo "Gender: " . htmlspecialchars($row['gender']); ?></p>
                            <p><?php echo "Address: " . htmlspecialchars($row['addr']); ?></p>
                            <p><?php echo "State: " . htmlspecialchars($row['country_state']); ?></p>
                            <p><?php echo "Skills: " . htmlspecialchars($row['skills']); ?></p>
                            <p><?php echo "Other Skills: " . htmlspecialchars($row['other_skills']); ?></p>
                            <p><?php echo htmlspecialchars($row['post_date']); ?></p>
                            <p class="status-pending">Status: Pending</p>
                            <form method="post" action="manage.php">
                                <input type="hidden" name="edit-id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="action" value="accept" class="accept">Accept</button>
                                <button type="submit" name="action" value="reject" class="reject">Reject</button>
                                <button type="submit" name="action" value="delete" class="delete">Delete</button>
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
                            <p>
                                <?php echo "DOB: " . htmlspecialchars($row['dob']); ?>
                            </p>
                            <p><?php echo htmlspecialchars($row['address']); ?></p>
                            <p><?php echo htmlspecialchars($row['state']); ?></p>
                            <p class="status-accepted">Status: Accepted</p>
                            <form method="post" action="manage.php">
                                <input type="hidden" name="edit-id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="action" value="pending" class="pending-button">Pending</button>
                                <button type="submit" name="action" value="reject" class="reject">Reject</button>
                                <button type="submit" name="action" value="delete" class="delete">Delete</button>
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
                                <button type="submit" name="action" value="accept" class="accept">Accept</button>
                                <button type="submit" name="action" value="pending" class="pending-button">Pending</button>
                                <button type="submit" name="action" value="delete" class="delete">Delete</button>
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