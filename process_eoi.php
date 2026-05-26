<?php
session_start();
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: apply.php");
    exit();
}

$errors = [];
$old = [];

// Reference Number
$reference_number = trim($_POST["Reference_Number"] ?? "");
$old["Reference_Number"] = $reference_number;
if (empty($reference_number)) {
    $errors["Reference_Number"] = "Please select a job position.";
}

// First Name
$fname = trim($_POST["First_Name"] ?? "");
$old["First_Name"] = $fname;
if (empty($fname)) {
    $errors["First_Name"] = "First name is required.";
} elseif (!preg_match('/^[A-Za-z ]+$/', $fname)) {
    $errors["First_Name"] = "First name must contain only letters and spaces.";
} elseif (strlen($fname) > 20) {
    $errors["First_Name"] = "First name must be 20 characters or fewer.";
}

// Last Name
$lname = trim($_POST["Last_Name"] ?? "");
$old["Last_Name"] = $lname;
if (empty($lname)) {
    $errors["Last_Name"] = "Last name is required.";
} elseif (!preg_match('/^[A-Za-z ]+$/', $lname)) {
    $errors["Last_Name"] = "Last name must contain only letters and spaces.";
} elseif (strlen($lname) > 20) {
    $errors["Last_Name"] = "Last name must be 20 characters or fewer.";
}

// Date of Birth
$dob_raw = trim($_POST["DateOfBirth"] ?? "");
$old["DateOfBirth"] = $dob_raw;
if (empty($dob_raw)) {
    $errors["DateOfBirth"] = "Date of birth is required.";
} elseif (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $dob_raw)) {
    $errors["DateOfBirth"] = "Date of birth must be in dd/mm/yyyy format.";
} else {
    list($day, $month, $year) = explode("/", $dob_raw);
    if (!checkdate((int) $month, (int) $day, (int) $year)) {
        $errors["DateOfBirth"] = "Please enter a valid date of birth.";
    } else {
        $dob_date = new DateTime("$year-$month-$day");
        $today = new DateTime();
        $age = $today->diff($dob_date)->y;
        if ($age < 18) {
            $errors["DateOfBirth"] = "You must be at least 18 years old to apply.";
        } elseif ($age > 100) {
            $errors["DateOfBirth"] = "Please enter a valid date of birth.";
        }
    }
}

// Email
$email_raw = trim($_POST["Email_Address"] ?? "");
$old["Email_Address"] = $email_raw;
if (empty($email_raw)) {
    $errors["Email_Address"] = "Email address is required.";
} elseif (!filter_var($email_raw, FILTER_VALIDATE_EMAIL)) {
    $errors["Email_Address"] = "Please enter a valid email address.";
}

// Phone Number
$phone_raw = trim($_POST["Phone_Number"] ?? "");
$old["Phone_Number"] = $phone_raw;
if (empty($phone_raw)) {
    $errors["Phone_Number"] = "Phone number is required.";
} elseif (!preg_match('/^[0-9]{8,12}$/', $phone_raw)) {
    $errors["Phone_Number"] = "Phone number must be 8 to 12 digits.";
}

// Gender
$gender = $_POST["Gender"] ?? "";
$old["Gender"] = $gender;
$valid_genders = ["Male", "Female", "Other"];
if (empty($gender)) {
    $errors["Gender"] = "Please select a gender.";
} elseif (!in_array($gender, $valid_genders)) {
    $errors["Gender"] = "Invalid gender selection.";
}

// Address parts
$address_parts = $_POST["Address"] ?? [];
$old["Address"] = $address_parts;
$street = trim($address_parts[0] ?? "");
$suburb = trim($address_parts[1] ?? "");
$postcode = trim($address_parts[2] ?? "");

if (empty($street)) {
    $errors["Street"] = "Street address is required.";
} elseif (!preg_match('/^\d+[\s\/][a-zA-Z0-9\s.,\/-]{3,38}$/', $street)) {
    $errors["Street"] = "Street address must start with a number (e.g. 12 Main St) and be 5–40 characters.";
}

if (empty($suburb)) {
    $errors["SuburbTown"] = "Suburb/Town is required.";
} elseif (!preg_match('/^[a-zA-Z0-9\s.,-]{5,40}$/', $suburb)) {
    $errors["SuburbTown"] = "Suburb/Town must be 5–40 characters (letters, numbers, spaces, . , -)";
}

if (empty($postcode)) {
    $errors["Postcode"] = "Postcode is required.";
} elseif (!preg_match('/^[0-9]{4}$/', $postcode)) {
    $errors["Postcode"] = "Postcode must be exactly 4 digits.";
}

// State
$state = $_POST["State"] ?? "";
$old["State"] = $state;
$valid_states = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
if (empty($state)) {
    $errors["State"] = "Please select a state.";
} elseif (!in_array($state, $valid_states)) {
    $errors["State"] = "Invalid state selection.";
}

// Skills – at least one required
$skills_raw = $_POST["Skills"] ?? [];
$old["Skills"] = $skills_raw;
$valid_skills = ["HTML", "JIRA", "CSS", "Javascript", "PHP", "MySQL", "Communication", "ProblemSolvingSkills"];
$skills_filtered = array_values(array_filter($skills_raw, fn($s) => in_array($s, $valid_skills)));
if (empty($skills_filtered)) {
    $errors["Skills"] = "Please select at least one skill.";
}

// Other Skills (optional, max 500 chars)
$other_skills = trim($_POST["Other_Skills"] ?? "");
$old["Other_Skills"] = $other_skills;
if (strlen($other_skills) > 500) {
    $errors["Other_Skills"] = "Other skills description must be 500 characters or fewer.";
}

// If validation failed, redirect back with errors
if (!empty($errors)) {
    $_SESSION["errors"] = $errors;
    $_SESSION["old"] = $old;
    header("Location: apply.php");
    exit();
}

// All valid – insert using prepared statement
$address_str = implode(", ", [$street, $suburb, $postcode]);
$skills_str = implode(", ", $skills_filtered);

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO Eoi (reference_number, fname, lname, dob, email, phone, gender, addr, country_state, skills, other_skills)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
);
mysqli_stmt_bind_param(
    $stmt,
    "sssssssssss",
    $reference_number,
    $fname,
    $lname,
    $dob_raw,
    $email_raw,
    $phone_raw,
    $gender,
    $address_str,
    $state,
    $skills_str,
    $other_skills
);

if (!mysqli_stmt_execute($stmt)) {
    die("Query failed: " . mysqli_stmt_error($stmt));
}
$app_id = mysqli_insert_id($conn);
mysqli_stmt_close($stmt);
mysqli_close($conn);

unset($_SESSION["errors"], $_SESSION["old"]);

header("Location: submitted.php?name=" . urlencode($fname . " " . $lname) . "&app_id=" . $app_id);
exit();
?>