<?php
session_start();


// Check if the session variables are set
if (!isset($_SESSION["user_answers"]) || !isset($_SESSION["correct_answers"]) || !isset($_SESSION["checkbox_questions"])) {
    // Redirect to the index page if the session variables are not set
    header("Location: index.php");
    exit();
}

// Retrieve the answers and score from the session
$user_answers = $_SESSION["user_answers"];
$correct_answers = $_SESSION["correct_answers"];
$checkbox_questions = $_SESSION["checkbox_questions"];
$textarea_questions = $_SESSION["textarea_questions"];

// Calculate the total number of questions
$total_questions = count($correct_answers);

// Clear the session variables after retrieving them
unset($_SESSION["user_answers"]);
unset($_SESSION["correct_answers"]);
unset($_SESSION["checkbox_questions"]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main>  
        
        
        <div>
            <div>
                <label>1. What does "IP" stand for in networking?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['ip']); ?>
                <?php if (strcasecmp($user_answers['ip'] ?? '', $correct_answers['ip']) === 0) {
                        echo '<span style="color: green;">CORRECT</span>';
                    } else {
                        echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['ip']) . '</span>';
                    } ?>
            </div>

            <div>
                <label>2. What does "BIOS" stand for in computers?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['bios']); ?>
                <?php if (strcasecmp($user_answers['bios'] ?? '', $correct_answers['bios']) === 0) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['bios']) . '</span>';
                } ?>
            </div>

            <div>
                <label>3. Which of the following is an example of an operating system?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['os']); ?>
                <?php if (strcasecmp($user_answers['os'] ?? '', $correct_answers['os']) === 0) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['os']) . '</span>';
                } ?>
            </div>

            <div>
                <label>4. What does "SQL" stand for?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['sql_answer']); ?>
                <?php if (strcasecmp($user_answers['sql_answer'] ?? '', $correct_answers['sql_answer']) === 0) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['sql_answer']) . '</span>';
                } ?>
            </div>

            <div>
                <label>5. Which of the following is an example of an output device?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['output_device']); ?>
                <?php if (strcasecmp($user_answers['output_device'] ?? '', $correct_answers['output_device']) === 0) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['output_device']) . '</span>';
                } ?>
            </div>

            <div>
                <label>6. Which of the following are examples of programming languages? (Select all that apply)</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars(implode(', ', $user_answers['programming_languages'] ?? [])); ?>
                <?php if (isset($user_answers['programming_languages']) && 
                    !array_diff($checkbox_questions['programming_languages'], $user_answers['programming_languages']) && 
                    !array_diff($user_answers['programming_languages'], $checkbox_questions['programming_languages'])) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars(implode(', ', $checkbox_questions['programming_languages'])) . '</span>';
                } ?>
            </div>
                
            <div>
                <label>7. Which company owns LinkedIn, the business networking platform? </label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['linkedin_owner']); ?>
                <?php if (strcasecmp($user_answers['linkedin_owner'] ?? '', $correct_answers['linkedin_owner']) === 0) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['linkedin_owner']) . '</span>';
                } ?>
            </div>

            <div>
                <label>8. Which IT billionaire pledged to donate most of their wealth through the "Giving Pledge"?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['giving_pledge']); ?>
                <?php if (strcasecmp($user_answers['giving_pledge'] ?? '', $correct_answers['giving_pledge']) === 0) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['giving_pledge']) . '</span>';
                } ?>
            </div>

            <div>
                <label>9. Which of the following are types of cyber threats? (Select all that apply)</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars(implode(', ', $user_answers['cyber_threats'] ?? [])); ?>
                <?php 
                if (isset($user_answers['cyber_threats']) && 
                    !array_diff($checkbox_questions['cyber_threats'], $user_answers['cyber_threats']) && 
                    !array_diff($user_answers['cyber_threats'], $checkbox_questions['cyber_threats'])) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars(implode(', ', $checkbox_questions['cyber_threats'])) . '</span>';
                } ?>
            </div>

            <div>
                <label>10. What is the definition of RAM?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['ram']); ?>
                <?php $textarea_question = $textarea_questions['ram'] ?? []; // Get the array of correct answers
                $user_answer = $user_answers['ram'] ?? ''; // Get the user's answer

                // Initialize a variable to track if any keyword is found
                $found_keyword = false;

                // Check if the user's answer contains any of the keywords
                foreach ($textarea_question as $textarea_q) {
                    // Convert both the user's answer and the keyword to lowercase for case-insensitive comparison
                    if (stripos($user_answer, trim($textarea_q)) !== false) {
                        $found_keyword = true;
                        break; // Exit the loop if a keyword is found
                    }
                }

                if ($found_keyword) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    // If no keyword is found, show the first correct answer (or handle it as needed)
                    $first_correct_answer = htmlspecialchars($textarea_question[0] ?? 'No correct answer available');
                    echo '<span style="color: red;">INCORRECT: ' . $first_correct_answer . '</span>';
                } ?>
            </div>

            <div>
                <label>11. What year was the first iPhone released?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['iphone_year']); ?>
                <?php if (strcasecmp($user_answers['iphone_year'] ?? '', $correct_answers['iphone_year']) === 0) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['iphone_year']) . '</span>';
                } ?>
            </div>

            <div>
                <label>12. What is a computer virus?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['virus']); ?>
                <?php $textarea_question = $textarea_questions['virus'] ?? []; // Get the array of correct answers
                $user_answer = $user_answers['virus'] ?? ''; // Get the user's answer

                // Initialize a variable to track if any keyword is found
                $found_keyword = false;

                // Check if the user's answer contains any of the keywords
                foreach ($textarea_question as $textarea_q) {
                    // Convert both the user's answer and the keyword to lowercase for case-insensitive comparison
                    if (stripos($user_answer, trim($textarea_q)) !== false) {
                        $found_keyword = true;
                        break; // Exit the loop if a keyword is found
                    }
                }

                if ($found_keyword) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    // If no keyword is found, show the first correct answer (or handle it as needed)
                    $first_correct_answer = htmlspecialchars($textarea_question[0] ?? 'No correct answer available');
                    echo '<span style="color: red;">INCORRECT: ' . $first_correct_answer . '</span>';
                } ?>
            </div>

            <div>
                <label>13. Which of the following companies were founded in a garage? (Select all that apply)</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars(implode(', ', $user_answers['garage_companies'] ?? [])); ?>
                <?php 
                if (isset($user_answers['garage_companies']) && 
                    !array_diff($checkbox_questions['garage_companies'], $user_answers['garage_companies']) && 
                    !array_diff($user_answers['garage_companies'], $checkbox_questions['garage_companies'])) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars(implode(', ', $checkbox_questions['garage_companies'])) . '</span>';
                } ?>
            </div>

            <div>
                <label>14. What is the acronym of the word Information Technology?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['it_acronym']); ?>
                <?php if (strcasecmp($user_answers['it_acronym'] ?? '', $correct_answers['it_acronym']) === 0) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['it_acronym']) . '</span>';
                } ?>
            </div>

            <div>
                <label>15. What is the full name of the creator of Facebook?</label>
                <strong>Your Answer:</strong> <?php echo htmlspecialchars($user_answers['creator']); ?>
                <?php if (strcasecmp($user_answers['creator'] ?? '', $correct_answers['creator']) === 0) {
                    echo '<span style="color: green;">CORRECT</span>';
                } else {
                    echo '<span style="color: red;">INCORRECT: ' . htmlspecialchars($correct_answers['creator']) . '</span>';
                } ?>
            </div>

            <div class="button">
                <a href="questions.php">Retake Quiz</a>
            </div>
            <div class="button">
                <a href="index.php">Back</a>
            </div>
        </div>

    </main>
    
    <footer>
        <p>This content is neither created nor endorsed by Google.</p>
        <p><a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
    </footer>

</body>
</html>