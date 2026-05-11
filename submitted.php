<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>

<body>

</body>

</html>
<?php
if (!isset($_GET["name"])) {
    header("Location: apply.php");
    exit();
}
$name = htmlspecialchars($_GET["name"] ?? "Applicant");
?>

<h1>Thank you
    <?php echo $name; ?>
</h1>
<p>Your expression of interest has been submitted</p>
<p>You may now close this page</p>