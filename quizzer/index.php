<?php session_start(); ?>

<?php include 'database.php'; ?>
<?php

/*
*Get Total Question
*/
$query = 'SELECT * FROM questions ';
$result = $mysqli->query($query) or die($query.'<br>'.$mysqli->error.__LINE__);
$total = $result->num_rows;

?>
<?php if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = $total;
} ?>
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
		<div class="container" style="height:500px;margin-top:4%;">
			<h2>Test your dnowledge</h2>
			<p>This is a multiple choice quiz to test yous knowledge of PHP. </p>
			<ul>
				<li><strong>Number of questions:</strong> <?php echo $total; ?></li>
				<li><strong>Type:</strong> Multiple choice</li>
				<li><strong>Estimated Time:</strong> <?php echo $total * .5; ?> Minutes</li>		
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2021, PHP Quizzer.
		</div>
	</footer>

</body>
</html>