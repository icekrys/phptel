<?php
include ('config.php'); 

// Handle deletion if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $id_to_delete = intval($_POST['delete_id']);
    $query = "DELETE FROM user_table WHERE Id = $id_to_delete";
    
    if (mysqli_query($con, $query)) {
        $message = "Record deleted successfully.";
    } else {
        $message = "Error deleting record: " . mysqli_error($con);
    }
}

// Fetch data from the database
    $sql = "SELECT Id, Name_user, Date_user FROM user_table"; // Adjust table name if needed
    $result = mysqli_query($con, $sql); // Ensure $conn matches config.php
?>
<!DOCTYPE html>  
    <html>
        <head>
        <title> Table </title>
    <link rel="stylesheet" href="style.css">
    <style>
        .selected { background-color: #ffcccb !important; }
        button:disabled { background-color: gray; cursor: not-allowed; }
    </style>
    <script>
        function selectRow(row, id) {
            document.getElementById('delete_id').value = id;
            let selectedRow = document.querySelector(".selected");
            if (selectedRow) { selectedRow.classList.remove("selected"); }
            row.classList.add("selected");

            // Enable the delete button
            document.getElementById('deleteBtn').disabled = false;
        }

        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
        </head>
        <body>  
        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
            <table class = "content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date Answered<th>
                    </tr>
                </thead>
            <tbody>
            <?php
            // Check if there are rows in the result
            if ($result && mysqli_num_rows($result) > 0) {
                // Fetch each row and display it in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Id']) . "</td>"; // Fixed column name
                    echo "<td>" . htmlspecialchars($row['Name_user']) . "</td>"; // Fixed column name
                    echo "<td>" . htmlspecialchars($row['Date_user']) . "</td>"; // Fixed column name
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data available</td></tr>";
            }
            ?>
            </tbody>
            </table>
            
             <!-- Delete Button Form -->
            <form method="POST" action="">
            <input type="hidden" name="delete_id" id="delete_id">
            <button type="submit">Delete</button>
            </form>
            <!-- Button to Redirect -->
            <div class="create">
                <button onclick="createForm()">Create</button>
            </div>
            <script>
                function createForm() {
                    window.location.href = "questions.php"; // Change this if needed
                }
            </script>
        </body>
    </html>
<?php
mysqli_close($con);
?>