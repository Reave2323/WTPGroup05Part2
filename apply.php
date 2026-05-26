<?php
session_start();
$errors = $_SESSION["errors"] ?? [];
$old = $_SESSION["old"] ?? [];
unset($_SESSION["errors"], $_SESSION["old"]);
?>
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
			color: #d2761a;
			text-align: center;
			justify-content: center;
			position: relative;
			padding: 1%;
			grid-template-columns: 0%;
			margin: 0%;
			text-decoration-line: underline;
		}

		.form-errors {
			background-color: #fde8e8;
			border: 1px solid #e53e3e;
			border-radius: 4px;
			padding: 12px 16px;
			margin-bottom: 16px;
			color: #c53030;
		}

		.form-errors ul {
			margin: 0;
			padding-left: 20px;
		}

		.field-error {
			color: #e53e3e;
			font-size: 0.875em;
			display: block;
			margin-top: 2px;
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
				<h2 style="text-align: center;">Please leave no spaces blank</h2>
			</div>

			<?php if (!empty($errors)): ?>
				<div class="form-errors">
					<strong>Please fix the following errors:</strong>
					<ul>
						<?php foreach ($errors as $error): ?>
							<li><?= htmlspecialchars($error) ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<div class="div1">
				<fieldset>
					<legend>Position Applied</legend>

					<?php
					include_once("settings.php");
					$conn = mysqli_connect($host, $user, $pwd, $sql_db);
					if (!$conn) {
						die("Connection failed:" . mysqli_connect_error());
					}

					$query = "SELECT reference_number, job_name FROM jobslisting";
					$result = mysqli_query($conn, $query);
					echo '<label for="Reference_Number" class="Labeling">Job Reference Number</label>';
					echo '<select name="Reference_Number" id="Reference_Number">';
					while ($row = mysqli_fetch_assoc($result)) {
						$selected = (($old["Reference_Number"] ?? "") == $row["reference_number"]) ? ' selected' : '';
						echo '<option value="' . htmlspecialchars($row['reference_number']) . '"' . $selected . '>'
							. htmlspecialchars($row['job_name']) .
							'</option>';
					}
					echo '</select>';
					if (isset($errors["Reference_Number"])) {
						echo '<span class="field-error">' . htmlspecialchars($errors["Reference_Number"]) . '</span>';
					}
					mysqli_close($conn);
					?>
				</fieldset>
			</div>
			<div class="div2">
				<fieldset>
					<!---general users-information-->

					<legend>Personal Information</legend>

					<p>
						<label for="FirstName" class="Labeling">First Name</label>
						<input type="text" id="FirstName" name="First_Name" maxlength="20"
							value="<?= htmlspecialchars($old["First_Name"] ?? "") ?>" />
						<?php if (isset($errors["First_Name"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["First_Name"]) ?></span>
						<?php endif; ?>

						<label for="LastName">Last Name</label>
						<input type="text" id="LastName" name="Last_Name" maxlength="20"
							value="<?= htmlspecialchars($old["Last_Name"] ?? "") ?>" />
						<?php if (isset($errors["Last_Name"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["Last_Name"]) ?></span>
						<?php endif; ?>

						<label for="DateOfBirth">Date Of Birth</label>
						<input type="text" id="DateOfBirth" name="DateOfBirth" placeholder="dd/mm/yyyy"
							value="<?= htmlspecialchars($old["DateOfBirth"] ?? "") ?>" />
						<?php if (isset($errors["DateOfBirth"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["DateOfBirth"]) ?></span>
						<?php endif; ?>
					</p>
					<p>
						<label for="Email">Email</label>
						<input type="text" id="Email" name="Email_Address"
							value="<?= htmlspecialchars($old["Email_Address"] ?? "") ?>" />
						<?php if (isset($errors["Email_Address"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["Email_Address"]) ?></span>
						<?php endif; ?>
						<label for="Phone_Number">Phone Number</label>
						<input type="text" id="Phone_Number" name="Phone_Number"
							value="<?= htmlspecialchars($old["Phone_Number"] ?? "") ?>" />
						<?php if (isset($errors["Phone_Number"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["Phone_Number"]) ?></span>
						<?php endif; ?>
					</p>

					<fieldset>
						<legend>Gender</legend>
						<label for="Male">M</label>
						<input type="radio" id="Male" name="Gender" value="Male" <?= (($old["Gender"] ?? "") === "Male" ? "checked" : "") ?> />
						<label for="Female">F</label>
						<input type="radio" id="Female" name="Gender" value="Female" <?= (($old["Gender"] ?? "") === "Female" ? "checked" : "") ?> />
						<label for="Others">Others</label>
						<input type="radio" id="Others" name="Gender" value="Other" <?= (($old["Gender"] ?? "") === "Other" ? "checked" : "") ?> />

						<?php if (isset($errors["Gender"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["Gender"]) ?></span>
						<?php endif; ?>
					</fieldset>
				</fieldset>
			</div>

			<div class="div3">
				<fieldset>
					<!---Address-->
					<legend>Address</legend>
					<p>
						<label for="Street">Street Address</label>
						<input type="text" id="Street" name="Address[]" maxlength="40"
							value="<?= htmlspecialchars($old["Address"][0] ?? "") ?>" />
						<?php if (isset($errors["Street"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["Street"]) ?></span>
						<?php endif; ?>

						<label for="SuburbTown">Suburb/Town</label>
						<input type="text" id="SuburbTown" name="Address[]" maxlength="40"
							value="<?= htmlspecialchars($old["Address"][1] ?? "") ?>" />
						<?php if (isset($errors["SuburbTown"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["SuburbTown"]) ?></span>
						<?php endif; ?>
					</p>

					<p>
						<label for="State">States</label>
						<select id="State" name="State">
							<option value="">Select a State</option>
							<?php
							$states = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
							foreach ($states as $s) {
								$selected = (($old["State"] ?? "") === $s) ? ' selected' : '';
								echo "<option value=\"$s\"$selected>$s</option>";
							}
							?>
						</select>
						<?php if (isset($errors["State"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["State"]) ?></span>
						<?php endif; ?>
					</p>
					<p>
						<label for="Postcode">Post Code</label>
						<input type="text" id="Postcode" name="Address[]"
							value="<?= htmlspecialchars($old["Address"][2] ?? "") ?>" />
						<?php if (isset($errors["Postcode"])): ?>
							<span class="field-error"><?= htmlspecialchars($errors["Postcode"]) ?></span>
						<?php endif; ?>
					</p>
				</fieldset>
			</div>

			<div class="div4">
				<fieldset>
					<legend>Skill Set</legend>
					<?php if (isset($errors["Skills"])): ?>
						<span class="field-error"><?= htmlspecialchars($errors["Skills"]) ?></span>
					<?php endif; ?>

					<p>
						<?php
						$checked_skills = $old["Skills"] ?? ["HTML", "JIRA", "CSS", "Javascript", "PHP", "MySQL", "Communication", "ProblemSolvingSkills"];
						$skill_labels = [
							"HTML" => "HTML",
							"JIRA" => "JIRA",
							"CSS" => "CSS",
							"Javascript" => "Javascript",
							"PHP" => "PHP",
							"MySQL" => "MySQL",
						];
						foreach ($skill_labels as $val => $label) {
							$checked = in_array($val, $checked_skills) ? " checked" : "";
							echo "<label for=\"{$val}_exp\">$label</label>";
							echo "<input type=\"checkbox\" id=\"{$val}_exp\" name=\"Skills[]\" value=\"$val\"$checked />";
						}
						?>
					</p>

					<p>
						<?php
						$comm_checked = in_array("Communication", $checked_skills) ? " checked" : "";
						$prob_checked = in_array("ProblemSolvingSkills", $checked_skills) ? " checked" : "";
						?>
						<label for="Communication">Communication Skills</label>
						<input type="checkbox" name="Skills[]" id="Communication" value="Communication" <?= $comm_checked ?> />
						<label for="ProblemSolvingSkills">Problem Solving Skills</label>
						<input type="checkbox" name="Skills[]" id="ProblemSolvingSkills" value="ProblemSolvingSkills"
							<?= $prob_checked ?> />
					</p>
				</fieldset>
			</div>

			<div class="div5">
				<fieldset>
					<legend>Other skills</legend>
					<label for="Other_Skills">Other Skills</label>
					<textarea placeholder="Describe your other skills" id="Other_Skills" name="Other_Skills" rows="4"
						cols="80%"><?= htmlspecialchars($old["Other_Skills"] ?? "") ?></textarea>
					<?php if (isset($errors["Other_Skills"])): ?>
						<span class="field-error"><?= htmlspecialchars($errors["Other_Skills"]) ?></span>
					<?php endif; ?>
				</fieldset>
			</div>

			<div class="div6">
				<input type="submit" value="Apply" class="apply_button" />
				<a href="apply.php" class="reset_button">Reset Application</a>
			</div>
		</form>
	</div>

	<?php
	include("./includes/footer.inc");
	?>
</body>

</html>