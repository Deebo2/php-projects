<?php

if (!isset($_SESSION)) {
    session_start();
}

?>
<?php include 'database.php'; ?>
<?php $query = 'SELECT * FROM questions ';
$result = $mysqli->query($query) or die($query.'<br>'.$mysqli->error.__LINE__);
$total = $result->num_rows;
 ?>
<?php if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}
?>
<?php
if (isset($_POST['submit'])) {
    $number = $_POST['number'];
    $current_choice = $_POST['choice'];
    $next = $number + 1;
    /*
    *Get correct choice
     */
    $query = "SELECT * FROM `choices` WHERE question_number = {$number} AND is_correct = 1";
    //Get result
    $result = $mysqli->query($query) or die($query.''.$mysqli->error.__LINE__);
    $choice = $result->fetch_assoc();
    //Set Correct choice
    $correct_choice = $choice['id'];
    //Compar
    if ($current_choice == $correct_choice) {
        //Answer is correct
        ++$_SESSION['score'];
    }
    if ($number == $total) {
        header('location: final.php');
        exit();
    } else {
        header('location: question.php?n='.$next);
        exit();
    }
}
?>
