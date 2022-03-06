<?php include 'db.php'; ?>

<?php
if(isset($_POST['submit'])){
    //get the post variables
    $question_number = $_POST['question_number'];
    $text = $_POST['text'];
    //create an array of choices
    $choices = array();
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];
    
    //qestion query
    $query = "INSERT INTO `questions`(question_number, text) VALUES('$question_number', '$text')";
    
    //run the query
    $insert_row = mysqli_query($connection, $query);
    
    //validate insert
    if($insert_row){
        foreach($choices as $choice => $value){
            if($value != ''){
                if($correct_choice == $choice){
                    $is_correct = 1;
                }else {
                    $is_correct = 0;
                }
                
                //choice query
                //qestion query
                $query = "INSERT INTO `choices`(question_number, is_correct, text) VALUES('$question_number', '$is_correct', '$value')";
    
                 //run the query
                $insert_row = mysqli_query($connection, $query);
                
                //validated insert
                if($insert_row){
                    continue;
                }else{
                    die('Error');
                }
            }
        }
        $msg = 'Question';
    }
     
}

//get the total
    $query = "SELECT * FROM `questions`";
    
     //GET results
    $results = mysqli_query($connection, $query);
    
    $total = $results->num_rows;
    $next = $total+1;
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
                <h1>Add Page</h1>
            </div>
        </header>
        
        <main>
            <div class="container">
                <h2>Add Quiz Question</h2>
                <?php 
                    if(isset($msg)){
                        echo '<p>'.$msg.'</p>';
                    }
                ?>
                <form method="POST" action="add.php">
                    <p>
                        <label>
                            Question Number:
                        </label>
                        <input type="number" value="<?php echo $next; ?>" name="question_number">
                    </p>
                    <p>
                        <label>
                            Question:
                        </label>
                        <input type="text" name="text">
                    </p>
                     <p>
                        <label>
                            Choice 1:
                        </label>
                        <input type="text" name="choice1">
                    </p>
                    <p>
                        <label>
                            Choice 2:
                        </label>
                        <input type="text" name="choice2">
                    </p>
                    <p>
                        <label>
                            Choice 3:
                        </label>
                        <input type="text" name="choice3">
                    </p>
                    <p>
                        <label>
                            Choice 4:
                        </label>
                        <input type="text" name="choice4">
                    </p>
                    <p>
                        <label>
                            Corrrect Number:
                        </label>
                        <input type="number" name="correct_choice">
                    </p>
                    <input type="submit" name="submit" value="Submit"></button>
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