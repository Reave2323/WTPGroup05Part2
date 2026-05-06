<?php
  $host = "localhost";
  $user = "userconn";
  $pwd = "";
  $sql_db = "jobs_database(1)";
?>

<?php
  require_once"settings.php";
    $conn = mysqli_connect("localhost", "userconn", "", "jobs_database");
    if (!$conn){
        die("Connection failed:" .mysql_connect_error());
    }
?>