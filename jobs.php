<?php
include_once('settings.php');

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$search = "";
if (isset($_GET['search'])) {
	$search = mysqli_real_escape_string($conn, $_GET['search']);//quotes and dashes cannot be used to manipulate the query database.

}

$query = "SELECT * FROM jobslisting WHERE job_name LIKE '%$search%'";
$result = mysqli_query($conn, $query);

?>



<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="keywords" content="shop, buisness, fakeshop, apply, job-listing" />
	<meta name="author" content="Moss, Kanav, Vichetra" />
	<title>Job Listings</title>
	<link rel="stylesheet" href="style/style.css" />
	<style>
		.left {
			overflow: hidden;
		}
	</style>
</head>

<body>
	<?php
	include("./includes/nav.inc");
	?>

	<div class="content-area">



		<h2><strong>Our Mission</strong></h2>
		<p>
			Here at FakeShop, we are committed to providing quality customer
			service. We are a small team consisting of 3 Founding members and are
			always on the lookout for new talent to help in our mission.
		</p>
		<div class="aside-container">
			<aside class="ready">
				<p>
					<strong>Ready to apply?</strong>Click on "Apply Now" when you're
					ready, or use the navigation bar
				</p>
			</aside>
			<aside class="details">
				<p>
					<strong>Want more information?</strong> Click on "Details" to get a
					detailed popup of all information about the job.
				</p>
			</aside>
			<aside class="not-found">
				<p>
					Can't find a job you're looking for? Send us a message, we might
					need someone with your skills
				</p>
			</aside>
		</div>
		<!-- Fieldsets for cards-->
		<fieldset>
			<?php
			$current_category = "";
			while ($row = mysqli_fetch_assoc($result)) {

				if ($row['category'] == 'Back End Development') {
					$image = './images/BackendDev.webp"';
				} else if ($row['category'] == 'Front End Development') {
					$image = './images/FrontEnd.webp" style="transform: rotate(-90deg)"';
				} else if ($row['category'] == 'Servicing Customers') {
					$image = './images/customersupportgraphic.webp" style="scale: ;"';
				} else {
					$image = 'DefaultJobImage.webp'; // image for Job categories
				}


				if ($row['category'] != $current_category) {
					if ($current_category != "") {
						echo "</div></fieldset>"; // Close previous category div and fieldset
					}
					$current_category = $row['category'];
					echo "<fieldset>"; // Start new category fieldset
					echo "<legend>" . htmlspecialchars($current_category) . "</legend>";
					echo "<div class='card-container'>"; // Start new category div	
				}



				echo ' <div class="card"> 
								<img src="' . $image . ' alt="' . htmlspecialchars($row['job_name']) . '" width="200" height="200" />
								<div class="card-content">
									<h3><strong>' . htmlspecialchars($row['job_name']) . '</strong></h3>
									<h4><strong>Reference Number: ' . $row['reference_number'] . '</strong></h4>
									<p>' . htmlspecialchars($row['job_description']) . '</p>
									<p><strong>Salary:</strong> ' . htmlspecialchars($row['salary']) . '</p>
									<a href="#job-popup-' . $row['id'] . '" class="button-style">Details</a>
								</div>
							</div>';
			}
			if ($current_category != "") {
				echo "</div></fieldset>"; // Close last category div and fieldset
			}

			?>
		</fieldset>


		<?php
		$popupinfo = mysqli_query($conn, "SELECT * FROM jobslisting");
		while ($row = mysqli_fetch_assoc($popupinfo)) {
			if ($row['category'] == 'Back End Development') {
				$image = './images/BackendDev.webp"';
			} else if ($row['category'] == 'Front End Development') {
				$image = './images/FrontEnd.webp" style="transform: rotate(-90deg)"';
			} else if ($row['category'] == 'Servicing Customers') {
				$image = './images/customersupportgraphic.webp" style="scale: ;"';
			} else {
				$image = 'images/DefaultJobImage.webp'; // image for Job categories
			}
			echo '<div id="job-popup-' . $row['id'] . '" class="popup">
					<div class="popup-card">
					<a href="#" class="close">&times;</a>
					<div class="left">
						<img loading="lazy" src="' . $image . ' alt="' . htmlspecialchars($row['job_name']) . '" width="100%" height="auto" />
					</div>
					<div class="right">
						<h3>' . htmlspecialchars($row['job_name']) . '</h3>
						<p> 💼 ' . htmlspecialchars($row['job_type']) . '</p>
						<p><strong>Location:</strong> ' . htmlspecialchars($row['location']) . '</p>
						<p><strong>Salary:</strong> ' . htmlspecialchars($row['salary']) . '</p>
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
						<a href="apply.php" class="button-style">Apply Now</a>
					</div>
				</div>
			</div>';




		}






		?>





		<?php
		include("./includes/footer.inc");
		?>
</body>

</html>