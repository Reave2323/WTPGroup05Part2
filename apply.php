<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="keywords" content="shop, buisness, fakeshop, apply, job-listing" />
	<meta name="author" content="Moss, Kanav, Vichetra" />
	<title>Apply to FakeShop</title>
	<link rel="stylesheet" href="./style/apply.css" />
	<link rel="stylesheet" href="./style/style.css" />

	<style>
		#JobApplication {
			color: goldenrod;
			text-align: center;
			justify-content: center;
			position: relative;
			padding: 1%;
			grid-template-columns: 0%;
			margin: 0%;
			text-decoration-line: underline;
		}
	</style>
</head>

<body>
	<?php
	include("./includes/nav.inc");
	?>
	<div class="content-area" style="margin-top:5px">
		<form action="process_eoi.php" method="post">
			<div class="Kbal">
				<h1 id="JobApplication">
					<strong>Official Employment Application</strong>
				</h1>
			</div>

			<div class="div1">
				<fieldset>
					<legend>Position Applied</legend>
					<p>
						<label for="Reference_Number" class="Labeling">Job Reference Number</label>
						<input type="text" id="Reference_Number" name="Reference_Number" pattern="[0-9]{5}"
							required="required" />
					</p>
				</fieldset>
			</div>
			<div class="div2">
				<fieldset>
					<!---general users-information-->

					<legend>Personal Information</legend>

					<p>
						<label for="FirstName" class="Labeling">First Name</label>
						<input type="text" id="FirstName" name="First_Name" maxlength="20" pattern="[A-Za-z ]+"
							required="required" />
						<label for="LastName"> Last Name</label>
						<input type="text" id="LastName" name="Last_Name" maxlength="20" pattern="[A-Za-z ]+"
							required="required" />
						<label for="DateOfBirth">Date Of Birth</label>
						<input type="text" id="DateOfBirth" name="DateOfBirth" pattern="\d{2}/\d{2}/\d{4}"
							placeholder="dd/mm/yyyy" required="required" />
					</p>
					<!--pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
							required -->
					<p>
						<label for="Email">Email</label>
						<input type="text" id="Email" name="Email_Address" />
						<label for="Phone_Number">Phone Number</label>
						<input type="text" id="Phone_Number" name="Phone_Number" pattern="[0-9]{8,12}" required />
					</p>

					<fieldset>
						<legend>Gender</legend>
						<label for="Male">M</label>
						<input type="radio" id="Male" name="Gender" value="male" required="required" />
						<label for="Female">F</label>
						<input type="radio" id="Female" name="Gender" value="Female" />

						<label for="Others">Others</label>
						<input type="radio" id="Others" name="Gender" value="others" />
					</fieldset>
				</fieldset>
			</div>

			<div class="div3">
				<fieldset>
					<!---Address-->
					<legend>Address</legend>
					<p>
						<label for="Street">Street Address</label>
						<input type="text" id="Street" name="Address[]" pattern="[a-zA-Z0-9\s.,-]{5,40}" maxlength="40"
							required="required" />
						<label for="Suburb/Town">Suburb/Town</label>
						<input type="text" id="Suburb/Town" name="Address[]" pattern="[a-zA-Z0-9\s.,-]{5,40}"
							maxlength="40" required="required" />
					</p>

					<p>
						<label for="State">States</label>
						<select id="State" name="State" required>
							<option value="">Select a State</option>
							<option value="VIC">VIC</option>
							<option value="NSW">NSW</option>
							<option value="QLD">QLD</option>
							<option value="NT">NT</option>
							<option value="WA">WA</option>
							<option value="SA">SA</option>
							<option value="TAS">TAS</option>
							<option value="ACT">ACT</option>
						</select>
					</p>
					<p>
						<label for="Postcode">Post Code</label>
						<input type="text" id="Postcode" name="Address[]" pattern="[0-9]{4}" required />
					</p>
				</fieldset>
			</div>

			<div class="div4">
				<fieldset>
					<legend>Skill Set</legend>

					<p>
						<!--Codeing skills (make drop down for those who click yes)-->
						<label for="HTML_exp">HTML</label>
						<input type="checkbox" id="HTML_exp" value="HTML" name="Skills[]" checked />
						<label for="JIRA_exp">JIRA</label>
						<input type="checkbox" id="JIRA_exp" value="JIRA" name="Skills[]" checked />
						<label for="CSS_exp">CSS</label>
						<input type="checkbox" id="CSS_exp" name="Skills[]" value="CSS" checked />
						<label for="Javascript_exp">Javascript</label>
						<input type="checkbox" name="Skills[]" id="Javascript_exp" value="Javascript" checked />
						<label for="PHP_exp">PHP</label>
						<input type="checkbox" id="PHP_exp" name="Skills[]" value="PHP" checked />
						<label for="MySQL_exp">MySQL</label>
						<input type="checkbox" name="Skills[]" id="MySQL_exp" value="MySQL" checked />
					</p>

					<p>
						<!---Communication Skills or smth idk-->
						<label for="Communication">Communication Skills</label>
						<input type="checkbox" name="Skills[]" id="Communication" value="Communication" checked />
						<label for="ProblemSolvingSkills">Problem Solving Skills</label>
						<input type="checkbox" name="Skills[]" id="ProblemSolvingSkills" value="ProblemSolvingSkills"
							checked />
					</p>
				</fieldset>
			</div>

			<div class="div5">
				<fieldset>
					<legend>Other skills</legend>
					<label for="Other_Skills"></label>
					<textarea placeholder="Describe your other skills" id="Other_Skills" name="Other_Skills" rows="4"
						cols="100"></textarea>
				</fieldset>
			</div>

			<div class="6">
				<input type="submit" value="Apply" class="apply_button" />
				<input type="Reset" value="Reset Application" class="reset_button" />
			</div>
		</form>
	</div>

	<?php
	include("./includes/footer.inc");
	?>
</body>

</html>