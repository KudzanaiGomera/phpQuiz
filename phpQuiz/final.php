<?php session_start();
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
                <h2>You are done!</h2>
                <p>
                    Congrats you have completed the test
                </p>
                <p>Final Score: <?php echo $_SESSION['score'];?></p>
                <a href="question.php?n=1" class="start"> Take Again</a>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2022, Our Company
            </div>
        </footer>
    </body>
</html>