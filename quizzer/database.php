<?php 
//Create Connection Credentials
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="quizzer";
//Create mysqli object
$mysqli=new mysqli($db_host,$db_user,$db_password,$db_name);
//Error Handler
if($mysqli->connect_error){
	printf("connect failed : %s \n",$mysqli->connect_error);
	exit();
}