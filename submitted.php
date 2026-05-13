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
$app_id = htmlspecialchars($_GET["app_id"] ?? "EoI_Id");
?>

<h1>Thank you
    <?php echo $name; ?>
</h1>
<p>Your expression of interest has been submitted</p>
<p>The ID for your EoI is: <?php echo $app_id; ?></p>
<p>You may now close this page</p>