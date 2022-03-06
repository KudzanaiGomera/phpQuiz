<?php
include 'db.php';
?>

<?php
session_start();;
?>

<?php
//check to see score is set
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

if($_POST){
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    
    $next = $number+1;
    
    //get the total
    $query = "SELECT * FROM `questions`";
    
     //GET results
    $results = mysqli_query($connection, $query);
    
    $total = $results->num_rows;
    
    //get correct choice
    $query = "SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1";
    
    //GET results
    $result = mysqli_query($connection, $query);
    
    $row = $result->fetch_assoc();
    
    //set the correct choice
    $correct_choice = $row['id'];
    
    //compare
    if($correct_choice == $selected_choice){
        //answer is correct
        $_SESSION['score']++;
    }
    
    //check if number is the last number
    if($number == $total){
        header("Location: final.php");
        exit();
    }else{
        header("Location: question.php?n=".$next);
    }
}

?>