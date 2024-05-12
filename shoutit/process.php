<?php

include './database.php';
//check if submitted succssfully
if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    date_default_timezone_set('America/New_York');
    $time = date('h:i:s a', time());
    //validation
    if (!isset($user) || $user == '' || !isset($message) || $message == '') {
        $error = 'Pleas fill in your name and a message';
        header('Location: index.php?error='.urlencode($error));
        exit();
    } else {
        $query = "INSERT INTO shouts ( user, message, time ) VALUES ('{$user}','{$message}','{$time}')";
        if (mysqli_query($conn, $query) && mysqli_affected_rows($conn) > 0) {
            header('Location: index.php');
            exit();
        } else {
            die('Error:'.$query.'<br>'.mysqli_error($conn));
        }
    }
}
