

<?php include 'database.php'; ?>
<?php
if (isset($_POST['submit'])) {
    //Get post variables
    $questoin_number = $_POST['question_number'];
    $questoin_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];
    $choices = array();
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];
    $choices[5] = $_POST['choice5'];
    //Question query
    $query = "INSERT INTO `questions` (question_number,text) VALUES
			 ({$questoin_number},'{$questoin_text}')";

	//Run query
	$insert_row=$mysqli->query($query) or die($query."<br>".$mysqli->error.__LINE__);
	//Validate insert
	if($insert_row){
		foreach($choices as $choice=>$value){
			if($correct_choice == $choice){
				$is_correct=1;
			}else{
				$is_correct=0;
			}
			//Choice query
			if($value){
				$query="INSERT INTO `choices` (question_number, is_correct,text) VALUES('{$questoin_number}','{$is_correct}','{$value}')";
			$insert_row=$mysqli->query($query) or die($query."<br>".$mysqli->error.__LINE__);
			}
			
		}
		$msg="Question added successfully";
	}

}
/*
*Get Total Question
*/
$query = 'SELECT * FROM questions ';
$result = $mysqli->query($query) or die($query.'<br>'.$mysqli->error.__LINE__);
$total = $result->num_rows;
$next=$total+1;
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP Quizzer</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>PHP Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Add A Question</h2>
			<?php 
			if(isset($msg)){
				echo "<p>".$msg."</p>";
			}
			?>
			<form method="POST" action="add.php">
				<p>
					<label>Question Numeber: </label>
					<input type="number" value="<?php echo $next; ?>" name="question_number" />
				</p>
				<p>
					<label>Question Text: </label>
					<input type="text" name="question_text" />
				</p>
				<p>
					<label>Choice #1 </label>
					<input type="text" name="choice1" />
				</p>
				<p>
					<label>Choice #2 </label>
					<input type="text" name="choice2" />
				</p>
				
				<p>
					<label>Choice #3 </label>
					<input type="text" name="choice3" />
				</p>
				<p>
					<label>Choice #4 </label>
					<input type="text" name="choice4" />
				</p>
				<p>
					<label>Choice #5 </label>
					<input type="text" name="choice5" />
				</p>
				<p>
					<label>Correct Choice Numeber:  </label>
					<input type="number" name="correct_choice" />
				</p>
				
				<p>
					<input type="submit" name="submit" value="submit" />
				</p>
				
				
				
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2021, PHP Quizzer.
		</div>
	</footer>

</body>
</html>