<?php
// Start a new session or resume the existing session
session_start();

// Read environment variables from Coolify
$host = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$database = getenv('DB_DATABASE') ?: 'questel';
$port = getenv('DB_PORT') ?: 3306;

// Establish a database connection using MySQLi
$con = mysqli_connect($host, $username, $password, $database, $port);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Validate that 'iphone_year' is an integer using filter_var()
if (!filter_var($_POST['iphone_year'] ?? 0, FILTER_VALIDATE_INT)) {
    $errors['iphone_year'] = "Please enter a valid year.";
}

// Retrieve and sanitize inputs using null coalescing operator
$nm = trim($_POST['nm'] ?? '');
$ip = $_POST['ip'] ?? '';
$bios = $_POST['bios'] ?? '';
$os = $_POST['os'] ?? '';
$sql_answer = $_POST['sql_answer'] ?? '';
$output_device = $_POST['output_device'] ?? '';
$programming_languages = isset($_POST['programming_languages']) ? implode(", ", $_POST['programming_languages']) : '';
$linkedin_owner = $_POST['linkedin_owner'] ?? '';
$giving_pledge = $_POST['giving_pledge'] ?? '';
$cyber_threats = isset($_POST['cyber_threats']) ? implode(", ", $_POST['cyber_threats']) : '';
$ram = $_POST['ram'] ?? '';
$iphone_year = $_POST['iphone_year'] ?? 0;
$virus = $_POST['virus'] ?? '';
$garage_companies = isset($_POST['garage_companies']) ? implode(", ", $_POST['garage_companies']) : '';
$it_acronym = $_POST['it_acronym'] ?? '';
$creator = $_POST['creator'] ?? '';

// Define correct answers for validation
$correct_answers = [
    "ip" => "Internet Protocol",
    "bios" => "Basic Input Output System",
    "os" => "Windows",
    "sql_answer" => "Structured Query Language",
    "output_device" => "Monitor",
    "linkedin_owner" => "Microsoft",
    "giving_pledge" => "Bill Gates",
    "iphone_year" => "2007",
    "it_acronym" => "IT",
    "creator" => "Mark Zuckerberg"
];

// Define questions with multiple possible correct answers (checkboxes)
$checkbox_questions = [
    "programming_languages" => ["Python", "Java", "PHP", "SQL"],
    "cyber_threats" => ["Phishing", "Malware"],
    "garage_companies" => ["Apple", "HP", "Google"]
];

// Define text-area questions with keyword-based evaluation
$textarea_questions = [
    "ram" => ["volatile memory", "temporarily stores data"],
    "virus" => ["malicious software", "damage files", "steal information"]
];

$user_answers = [];
$errors = [];
$score = 0;

// Validate text and radio inputs
foreach ($correct_answers as $question => $correct) {
    if (!isset($_POST[$question]) || trim($_POST[$question]) === "") {
        $errors[$question] = "This field is required!";
    } else {
        $user_answers[$question] = trim($_POST[$question]);
        if (strcasecmp($user_answers[$question], $correct) === 0) {
            $score++;
        }
    }
}

// Validate checkbox inputs
foreach ($checkbox_questions as $question => $correct_options) {
    $user_answers[$question] = $_POST[$question] ?? [];
    if (empty($user_answers[$question])) {
        $errors[$question] = "This field is required!";
    } else {
        sort($user_answers[$question]);
        sort($correct_options);
        if ($user_answers[$question] == $correct_options) {
            $score++;
        }
    }
}

// Validate textarea inputs by checking for keywords
foreach ($textarea_questions as $question => $keywords) {
    if (!isset($_POST[$question]) || trim($_POST[$question]) === "") {
        $errors[$question] = "This field is required!";
    } else {
        $user_answers[$question] = strtolower(trim($_POST[$question]));
        $found_keyword = false;
        foreach ($keywords as $keyword) {
            if (stripos($user_answers[$question], $keyword) !== false) {
                $score++;
                $found_keyword = true;
                break;
            }
        }
    }
}

// If there are validation errors, store in session and return to index.php
if (!empty($errors)) {
    $_SESSION["errors"] = $errors;
    $_SESSION["user_answers"] = $user_answers;
    header("Location: index.php");
    exit();
}

$date = date("Y-m-d"); // This will store today's date (2025-03-27)

// Prepare an SQL statement using prepared statements to prevent SQL injection
$stmt = mysqli_prepare($con, "INSERT INTO user_table (Name_user, Ip, Bios, Os, Sql_answer, Output_device, Programming_languages, Linkedin_owner, Giving_pledge, Cyber_threats, Ram, Iphone_year, Virus, Garage_companies, It_acronym, Creator, Date_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters to the SQL statement using appropriate data types
mysqli_stmt_bind_param($stmt, 'sssssssssssisssss', $nm, $ip, $bios, $os, $sql_answer, $output_device, $programming_languages, $linkedin_owner, $giving_pledge, $cyber_threats, $ram, $iphone_year, $virus, $garage_companies, $it_acronym, $creator, $date);
// Execute the SQL statement and check for errors
if (!mysqli_stmt_execute($stmt)) {
    die("Database error: " . mysqli_stmt_error($stmt));
}

// Close the statement
mysqli_stmt_close($stmt);

// Store the final score and answers in session for results display
$_SESSION["user_answers"] = $user_answers;
$_SESSION["correct_answers"] = $correct_answers;
$_SESSION["score"] = $score;
$_SESSION["checkbox_questions"] = $checkbox_questions;
$_SESSION["textarea_questions"] = $textarea_questions;

// Redirect to results page
header("Location: results.php");
exit();
?>