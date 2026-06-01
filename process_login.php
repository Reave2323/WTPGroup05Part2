<?php
session_start();
require_once("settings_admin.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user input and sanitize it
$username = trim($_POST['username']);
$password = trim($_POST['password']);
//Check for empty fields
if (empty($username) || empty($password)) {
    echo "Please enter both username and password.";
    echo '<br><button><a href="login.php" style="text-decoration: none;">Go back to login</a></button>';
    exit();
}

//Use prepared statements to prevent SQL injection
$stmt = mysqli_prepare($conn, "SELECT Username, Password FROM users WHERE Username = ?");
mysqli_stmt_bind_param($stmt, "s", $username); //s replaces ? from prepared statement
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);


//Checks password hash against the database
if ($user && password_verify($password, $user['Password'])) {
    session_regenerate_id(true); //Generates a session ID to prevent session hijacking
    $_SESSION['username'] = $user['Username'];
    header("Location: manage.php");
    exit();
} else {
    echo "Invalid username or password.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>