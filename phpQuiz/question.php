<?php
include 'db.php';
?>

<?php
session_start();;
?>

<?php
//set question number
$number = (int)$_GET['n'];

//get the total
$query = "SELECT * FROM `questions`";
    
//GET results
$results = mysqli_query($connection, $query);
    
$total = $results->num_rows;

//get the question
$query = "SELECT * FROM `questions` WHERE question_number = $number";
                    
//get results
$result = mysqli_query($connection, $query);

$question = $result->fetch_assoc();

//get choices
$query = "SELECT * FROM `choices` WHERE question_number = $number";
                   
//get choices
$choices = mysqli_query($connection, $query);

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
                <div class="current">Question <?php echo $question['question_number'];?> of <?php echo $total;?></div>
                <p class="question">
                    <?php echo $question['text'] ?>
                </p>
                <form method="POST" action="process.php">
                    <ul class="choices">
                        <?php while($row = $choices->fetch_assoc()): ?>
                        <li>
                            <input name="choice" type="radio" value="<?php  echo $row['id'];?>">
                            <?php echo $row['text']; ?>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <input type="submit" value="Submit" class="mybutton"></button>
                    <input type="hidden" name="number" value="<?php echo $number; ?>">
                </form>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2022, Our Company
            </div>
        </footer>
    </body>
</html>