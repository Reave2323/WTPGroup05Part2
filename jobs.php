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

		<!--search bar-->
		<form method="get" action="jobs.php">
			<input type="text" name="search" placeholder="Search for jobs..."
				value="<?php echo htmlspecialchars($search); ?>" />
			<button type="submit">Search</button>

		</form>

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
				//var_dump(array_keys($row));
				if ($row['category'] == 'Back End Development') {
					$image = 'BackendDev.webp';
				} else if ($row['category'] == 'Front End Development') {
					$image = 'FrontEnd.webp';
				} else if ($row['category'] == 'Servicing Customers') {
					$image = 'CustomerSupport.JPG';
				} else {
					$image = 'DefaultJobImage.jpg'; // image for Job categories
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
								<img src="images/' . $image . '" alt="' . htmlspecialchars($row['job_name']) . '" width="200" height="200" />
								<div class="card-content">
									<h3><strong>' . htmlspecialchars($row['job_name']) . '</strong></h3>
									<h4><strong>Reference Number: ' . $row['reference_number'] . '</strong></h4>
									<p>' . htmlspecialchars($row['job_description']) . '</p>
									<p><strong>Salary:</strong> ' . htmlspecialchars($row['salary']) . '</p>
									<a href="#job-popup-' . $row['reference_number'] . '" class="button-style">Details</a>
								</div>
							</div>';
			}
			if ($current_category != "") {
				echo "</div></fieldset>"; // Close last category div and fieldset
			}

			?>
		</fieldset>
		<!-- Database Engineer Popup -->
		<div id="job-popup-1" class="popup">
			<div class="popup-card">
				<!-- Close button -->
				<a href="#" class="close">&times;</a>

				<!-- Left image -->
				<div class="left-backend">
					<img loading="lazy" src="images/BackendDev.webp" alt="Job" />
				</div>

				<!-- Right content -->
				<div class="right">
					<h3>Backend Developer</h3>
					<p>💼 Full-time</p>
					<p><strong>Location:</strong> Hybrid</p>
					<p><strong>Salary:</strong> $75,000 + Superannuation</p>

					<section>
						<h2><strong>Key Responsibilities:</strong></h2>
						<p>
							Streamline the backend integrations of FakeShop and ensure
							that database entries are kept up to date and don’t fall
							behind. Ensuring that databases are backed up along a schedule
							that ensures that entries aren’t at risk of being lost.
							Ensuring correct sanitisation standards in MySQL to ensure
							databases are secure from attacks such as SQL-Injection.
						</p>
					</section>
					<section>
						<h2><strong>Essential Requirements:</strong></h2>

						<ul>
							<li>Understand MySQL</li>
							<li>
								Be able to search for possible security risks such as
								SQL-Injection
							</li>
							<li>
								Be committed to a full 24/7 call in for emergencies and be
								able to work from anywhere in the world. This is for extreme
								cases only and will not be a condition that is abused.
							</li>
							<li>5 Years experience required</li>
						</ul>
						<p><strong>Preffered Requirements:</strong></p>
						<ul>
							<li>Have used Jira as a project management tool</li>
							<li>Be able to work overtime to complete work on time</li>
							<li>
								Although this is primarily a remote position, it would be
								nice if you would be able to come into the office in
								Melbourne CBD at least once a week for group meetings/fun
								get togethers
							</li>
						</ul>
					</section>
					<a href="apply.html" class="button-style">Apply Now</a>
				</div>
			</div>
		</div>
		<!-- Database Engineer Popup -->
		<div id="job-popup-2" class="popup">
			<div class="popup-card">
				<!-- Close button -->
				<a href="#" class="close">&times;</a>

				<!-- Left image -->
				<div class="left-backend">
					<img loading="lazy" src="images/BackendDev.webp" alt="Job" width="200%" height="200%" />
				</div>

				<!-- Right content -->
				<div class="right">
					<h3>Database Engineer</h3>
					<p>💼 Full-time</p>
					<p><strong>Location:</strong> Hybrid</p>
					<p><strong>Salary:</strong> $75,000 + Superannuation</p>

					<section>
						<h2><strong>Key Responsibilities:</strong></h2>
						<p>
							Streamline the backend integrations of FakeShop and ensure
							that database entries are kept up to date and don’t fall
							behind. Ensuring that databases are backed up along a schedule
							that ensures that entries aren’t at risk of being lost.
							Ensuring correct sanitisation standards in MySQL to ensure
							databases are secure from attacks such as SQL-Injection.
						</p>
					</section>
					<section>
						<h2><strong>Essential Requirements:</strong></h2>

						<ul>
							<li>Understand MySQL</li>
							<li>
								Be able to search for possible security risks such as
								SQL-Injection
							</li>
							<li>
								Be committed to a full 24/7 call in for emergencies and be
								able to work from anywhere in the world. This is for extreme
								cases only and will not be a condition that is abused.
							</li>
							<li>5 Years experience required</li>
						</ul>
						<p><strong>Preffered Requirements:</strong></p>
						<ul>
							<li>Have used Jira as a project management tool</li>
							<li>Be able to work overtime to complete work on time</li>
							<li>
								Although this is primarily a remote position, it would be
								nice if you would be able to come into the office in
								Melbourne CBD at least once a week for group meetings/fun
								get togethers
							</li>
						</ul>
					</section>
					<a href="apply.html" class="button-style">Apply Now</a>
				</div>
			</div>
		</div>
		<!-- Database Engineer Popup -->
		<div id="job-popup-3" class="popup">
			<div class="popup-card">
				<!-- Close button -->
				<a href="#" class="close">&times;</a>

				<!-- Left image -->
				<div class="left-backend">
					<img loading="lazy" src="images/BackendDev.webp" alt="Job" width="200%" height="200%" />
				</div>

				<!-- Right content -->
				<div class="right">
					<h3>API Developer</h3>
					<p>💼 Full-time</p>
					<p><strong>Location:</strong> Hybrid</p>
					<p><strong>Salary:</strong> $75,000 + Superannuation</p>

					<section>
						<h2><strong>Key Responsibilities:</strong></h2>
						<p>
							Streamline the backend integrations of FakeShop and ensure
							that database entries are kept up to date and don’t fall
							behind. Ensuring that databases are backed up along a schedule
							that ensures that entries aren’t at risk of being lost.
							Ensuring correct sanitisation standards in MySQL to ensure
							databases are secure from attacks such as SQL-Injection.
						</p>
					</section>
					<section>
						<h2><strong>Essential Requirements:</strong></h2>

						<ul>
							<li>Understand MySQL</li>
							<li>
								Be able to search for possible security risks such as
								SQL-Injection
							</li>
							<li>
								Be committed to a full 24/7 call in for emergencies and be
								able to work from anywhere in the world. This is for extreme
								cases only and will not be a condition that is abused.
							</li>
							<li>5 Years experience required</li>
						</ul>
						<p><strong>Preffered Requirements:</strong></p>
						<ul>
							<li>Have used Jira as a project management tool</li>
							<li>Be able to work overtime to complete work on time</li>
							<li>
								Although this is primarily a remote position, it would be
								nice if you would be able to come into the office in
								Melbourne CBD at least once a week for group meetings/fun
								get togethers
							</li>
						</ul>
					</section>
					<a href="apply.html" class="button-style">Apply Now</a>
				</div>
			</div>
		</div>
		<div id="job-popup-4" class="popup">
			<div class="popup-card">
				<!-- Close button -->
				<a href="#" class="close">&times;</a>

				<!-- Left image -->
				<div class="left">
					<img loading="lazy" src="images/FrontEnd.webp" alt="Job" style="
									transform: rotate(-90deg);
									object-fit: contain;
									scale: 1.3;
								" />
				</div>

				<!-- Right content -->
				<div class="right">
					<h3>User Interface Designer</h3>
					<p>💼 Full-time</p>
					<p><strong>Location:</strong> Hybrid</p>
					<p><strong>Salary:</strong> $75,000 + Superannuation</p>
					<section>
						<h2><strong>KeyResponsibilities:</strong></h2>
						<p>
							Enhancing user experience and creating engaging web design
						</p>
					</section>
					<section>
						<h2><strong>Essential Requirements:</strong></h2>
						<ul>
							<li>Comfort in using css in a react framework</li>
							<li>
								Be able to understand basic backend frameworks to ensure
								functionality between front end and backend elements
							</li>
							<li>Minimum 10 years experience</li>
							<li>Good communication skills</li>
							<li>Ability to work independently and in small teams</li>
						</ul>
						<p><strong>Preffered Requirements:</strong></p>
						<ul>
							<li>Have used Jira as a project management tool</li>
							<li>Be able to work overtime to complete work on time</li>
							<li>
								Although this is primarily a remote position, it would be
								nice if you would be able to come into the office in
								Melbourne CBD at least once a week for group meetings/fun
								get togethers
							</li>
						</ul>
					</section>
					<a href="apply.html" class="button-style">Apply Now</a>
				</div>
			</div>
		</div>
		<div id="job-popup-5" class="popup">
			<div class="popup-card">
				<!-- Close button -->
				<a href="#" class="close">&times;</a>

				<!-- Left image -->
				<div class="left">
					<img loading="lazy" src="images/FrontEnd.webp" alt="Job" style="
									transform: rotate(-90deg);
									object-fit: contain;
									scale: 1.3;
								" />
				</div>

				<!-- Right content -->
				<div class="right">
					<h3>Frontend Developer</h3>
					<p>💼 Full-time</p>
					<p><strong>Location:</strong> Hybrid</p>
					<p><strong>Salary:</strong> $75,000 + Superannuation</p>
					<section>
						<h2><strong>KeyResponsibilities:</strong></h2>
						<p>
							Enhancing user experience and creating engaging web design
						</p>
					</section>
					<section>
						<h2><strong>Essential Requirements:</strong></h2>
						<ul>
							<li>Comfort in using css in a react framework</li>
							<li>
								Be able to understand basic backend frameworks to ensure
								functionality between front end and backend elements
							</li>
							<li>Minimum 10 years experience</li>
							<li>Good communication skills</li>
							<li>Ability to work independently and in small teams</li>
						</ul>
						<p><strong>Preffered Requirements:</strong></p>
						<ul>
							<li>Have used Jira as a project management tool</li>
							<li>Be able to work overtime to complete work on time</li>
							<li>
								Although this is primarily a remote position, it would be
								nice if you would be able to come into the office in
								Melbourne CBD at least once a week for group meetings/fun
								get togethers
							</li>
						</ul>
					</section>
					<a href="apply.html" class="button-style">Apply Now</a>
				</div>
			</div>
		</div>
		<div id="job-popup-6" class="popup">
			<div class="popup-card">
				<!-- Close button -->
				<a href="#" class="close">&times;</a>

				<!-- Left image -->
				<div class="left">
					<img loading="lazy" src="images/FrontEnd.webp" alt="Job" style="
									transform: rotate(-90deg);
									object-fit: contain;
									scale: 1.3;
								" />
				</div>

				<!-- Right content -->
				<div class="right">
					<h3>Frontend Software Engineer</h3>
					<p>💼 Full-time</p>
					<p><strong>Location:</strong> Hybrid</p>
					<p><strong>Salary:</strong> $75,000 + Superannuation</p>
					<section>
						<h2><strong>KeyResponsibilities:</strong></h2>
						<p>
							Enhancing user experience and creating engaging web design
						</p>
					</section>1
					<section>
						<h2><strong>Essential Requirements:</strong></h2>
						<ul>
							<li>Comfort in using css in a react framework</li>
							<li>
								Be able to understand basic backend frameworks to ensure
								functionality between front end and backend elements
							</li>
							<li>Minimum 10 years experience</li>
							<li>Good communication skills</li>
							<li>Ability to work independently and in small teams</li>
						</ul>
						<p><strong>Preffered Requirements:</strong></p>
						<ul>
							<li>Have used Jira as a project management tool</li>
							<li>Be able to work overtime to complete work on time</li>
							<li>
								Although this is primarily a remote position, it would be
								nice if you would be able to come into the office in
								Melbourne CBD at least once a week for group meetings/fun
								get togethers
							</li>
						</ul>
					</section>
					<a href="apply.html" class="button-style">Apply Now</a>
				</div>
			</div>
		</div>



		<!-- Customer Support Popup -->
		<div id="job-popup-7" class="popup">
			<div class="popup-card">
				<!-- Close button -->
				<a href="#" class="close">&times;</a>

				<!-- Left image -->
				<div class="left">
					<img loading="lazy" src="images/CustomerSupport.JPG" alt="Job" />
				</div>

				<!-- Right content -->
				<div class="right">
					<h3>Customer Support</h3>
					<p>💼 Full-time</p>
					<p><strong>Location:</strong> Remote</p>
					<p><strong>Salary:</strong> $75,000 + Superannuation</p>
					<section>
						<h2><strong>Key Responsibilities:</strong></h2>
						<p>
							Listening to customers’ questions and concerns and providing
							answers or responses.
						</p>
					</section>
					<section>
						<h2><strong>Essential Requirements:</strong></h2>
						<ul>
							<li>Strong communication skills</li>
							<li>Patience is always key</li>
							<li>Knowledge of the company (Don't worry you'll learn)</li>
							<li>Problem solving skills</li>
						</ul>
						<p><strong>Preffered Requirements:</strong></p>
						<ul>
							<li>1 Year Experience</li>
							<li>Adaptability</li>
						</ul>
					</section>
					<a href="apply.html" class="button-style">Apply Now</a>
				</div>
			</div>
		</div>
	</div>
	</div>

	<?php
	include("./includes/footer.inc");
	?>
</body>

</html>