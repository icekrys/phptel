<?php
session_start();
?>  
<!DOCTYPE html>
<html>
<head>
    <title> DOCS </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Quick test</h1>
        <hr class="header-line">
        <p class="subheading">How much knowledge do you have about IT!</p>
    </header>

    <main>
    <img src="Paimon__-removebg-preview.png" alt="description" width="200px" height="200px">  
        <form action = "action_page.php" method = "POST">
        <div>
                <label for="nm">1. Enter your name?</label>
                <input type="text" id="nm" name="nm" required>
            </div>

            <div>
                <label for="ip">1. What does "IP" stand for in networking?</label>
                <input type="text" id="ip" name="ip">
            </div>

            <div>
                <label for="bios">2. What does "BIOS" stand for in computers?</label>
                <input type="text" id="bios" name="bios">
            </div>

            <div>
                <label>3. Which of the following is an example of an operating system?</label>
                <label><input type="radio" name="os" value="Windows"> Windows</label>
                <label><input type="radio" name="os" value="Google"> Google</label>
                <label><input type="radio" name="os" value="Chrome"> Chrome</label>
            </div>

            <div>
                <label>4. What does "SQL" stand for?</label>
                <label><input type="radio" name="sql_answer" value="Simple Query Language"> Simple Query Language</label>
                <label><input type="radio" name="sql_answer" value="Structured Query Language"> Structured Query Language</label>
                <label><input type="radio" name="sql_answer" value="System Query Logic"> System Query Logic</label>
            </div>

            <div>
                <label>5. Which of the following is an example of an output device?</label>
                <label><input type="radio" name="output_device" value="Keyboard"> Keyboard</label>
                <label><input type="radio" name="output_device" value="Monitor"> Monitor</label>
                <label><input type="radio" name="output_device" value="Mouse"> Mouse</label>
            </div>

            <div>
                <label>6. Which of the following are examples of programming languages? (Select all that apply)</label>
                <label><input type="checkbox" name="programming_languages[]" value="Python"> Python</label>
                <label><input type="checkbox" name="programming_languages[]" value="HTML"> HTML</label>
                <label><input type="checkbox" name="programming_languages[]" value="Java"> Java</label>
                <label><input type="checkbox" name="programming_languages[]" value="SQL"> SQL</label>
                <label><input type="checkbox" name="programming_languages[]" value="CSS"> CSS</label>
                <label><input type="checkbox" name="programming_languages[]" value="PHP"> PHP</label>
            </div>

            <div>
                <label>7. Which company owns LinkedIn, the business networking platform?</label>
                <label><input type="radio" name="linkedin_owner" value="Microsoft"> Microsoft</label>
                <label><input type="radio" name="linkedin_owner" value="Google"> Google</label>
                <label><input type="radio" name="linkedin_owner" value="Meta"> Meta</label>
            </div>

            <div>
                <label>8. Which IT billionaire pledged to donate most of their wealth through the "Giving Pledge"?</label>
                <label><input type="radio" name="giving_pledge" value="Jeff Bezos"> Jeff Bezos</label>
                <label><input type="radio" name="giving_pledge" value="Elon Musk"> Elon Musk</label>
                <label><input type="radio" name="giving_pledge" value="Bill Gates"> Bill Gates</label>
            </div>

            <div>
                <label>9. Which of the following are types of cyber threats? (Select all that apply)</label>
                <label><input type="checkbox" name="cyber_threats[]" value="Phishing"> Phishing</label>
                <label><input type="checkbox" name="cyber_threats[]" value="Malware"> Malware</label>
                <label><input type="checkbox" name="cyber_threats[]" value="Fishing"> Fishing</label>
                <label><input type="checkbox" name="cyber_threats[]" value="Randomware"> Randomware</label>
                <label><input type="checkbox" name="cyber_threats[]" value="Hardware"> Hardware</label>
                <label><input type="checkbox" name="cyber_threats[]" value="Jojan Horse"> Jojan Horse</label>
            </div>

            <div>
                <label for="ram">10. What is the definition of RAM?</label>
                <textarea id="ram" name="ram"></textarea>
            </div>

            <div>
                <label for="iphone_year">11. What year was the first iPhone released?</label>
                <input type="number" id="iphone_year" name="iphone_year">
            </div>

            <div>
                <label for="virus">12. What is a computer virus?</label>
                <textarea id="virus" name="virus"></textarea>
            </div>

            <div>
                <label>13. Which of the following companies were founded in a garage? (Select all that apply)</label>
                <label><input type="checkbox" name="garage_companies[]" value="Apple"> Apple</label>
                <label><input type="checkbox" name="garage_companies[]" value="Microsoft"> Microsoft</label>
                <label><input type="checkbox" name="garage_companies[]" value="Amazon"> Amazon</label>
                <label><input type="checkbox" name="garage_companies[]" value="HP"> HP</label>
                <label><input type="checkbox" name="garage_companies[]" value="Facebook"> Facebook</label>
                <label><input type="checkbox" name="garage_companies[]" value="Google"> Google</label>
            </div>

            <div>
                <label for="it_acronym">14. What is the acronym of the word Information Technology?</label>
                <input type="text" id="it_acronym" name="it_acronym">
            </div>

            <div>
                <label for="creator">15. What is the full name of the creator of Facebook?</label>
                <input type="text" id="creator" name="creator">
            </div>

            <div class = "button">
                <input type="submit" value="submit">
            </div>
            
            <div class="button">
                <a href="index.php">Back</a>
            </div>

        </form>
    </main>
    
    <footer>
        <p>This content is neither created nor endorsed by Google.</p>
        <p>
        <a href="#">Terms of Service</a> | 
        <a href="#">Privacy Policy</a>
        </p>
        <p>Does this form look suspicious? <a href="#">Report</a></p>
    </footer>
        
</body>
</html>
<?php


?>