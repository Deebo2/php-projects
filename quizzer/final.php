<?php session_start(); ?>
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
			<h2>You're Done!</h2>
			<p>Congrats! You have completed the test. </p>
			<p>Final Score: <?php echo $_SESSION['score']; ?></p>
			<a href="question.php?n=1" class="start">Take Agine</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2021, PHP Quizzer.
		</div>
	</footer>

</body>
</html>