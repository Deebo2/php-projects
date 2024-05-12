<?php session_start(); ?>

<?php include 'database.php'; ?>
<?php $query = 'SELECT * FROM questions ';
$result = $mysqli->query($query) or die($query.'<br>'.$mysqli->error.__LINE__);
$total = $result->num_rows;
 ?>
<?php
//Set Question Number
$number = (int) $_GET['n'];
/*
*Get Questions
*/
$query = 'SELECT * FROM `questions` WHERE question_number ='.$number;
//Get Result
$result = $mysqli->query($query) or die($query.'<br>'.$mysqli->error.__LINE__);
$question = $result->fetch_assoc();
/*
*Get Choices
*/
$query = 'SELECT * FROM `choices` WHERE question_number ='.$question['question_number'];
//Get Result
$choices = $mysqli->query($query) or die($query.'<br>'.$mysqli->error.__LINE__);
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
			<div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
			<p class="question">
			<?php echo $question['text']; ?>
			</p>
			<form method="POST" action="process.php">
				<ul class="chocies">
					<?php while ($row = $choices->fetch_assoc()) : ?>
					<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?>.</li>
					<?php endwhile; ?>
				</ul>
				<input type="hidden" name="number" value="<?php echo $question['question_number']; ?>" />
				<input type="submit" name="submit" value="submit" />
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