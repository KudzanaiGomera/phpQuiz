<?php include 'db.php'; ?>

<?php 
//get the total number of questions
$query = "SELECT * FROM `questions`";

//GET results
$result = mysqli_query($connection, $query);

$total = $result->num_rows;

?>

<!DOCTYPE html5>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Quiz</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
    </head>
    <body>
        
        <header>
            <div class="container">
                <h1>Quiz</h1>
            </div>
        </header>
        
        <main>
            <div class="container">
                <h2>Test your skills</h2>
                <p>This is a multiple choice quiz to test you knowledge of the Job position</p>
            <ul>
                <li><strong>Number of Questions: </strong><?php echo $total; ?></li>
                <li><strong>Type: </strong>Multiple choice</li>
                <li><strong>Estimated Time: </strong><?php echo $total * .5; ?> Minutes</li>
            </ul>
            <a href="question.php?n=1" class="start">Start Quiz</a>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2022, Our Company
            </div>
        </footer>
    </body>
</html>

<php?

// Initialize the session
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

//including files
include_once 'db.php';

$sql 

?>