<?php  include './database.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>SHOUT IT!</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />

</head>
<body>
<div id="container">

    <header>
        <h1>ShoutIt Shoutbox</h1>
    </header>
    <div id="shouts">
        <ul>
        <?php  $query = 'SELECT * FROM `shouts` WHERE 1 ORDER BY id DESC';
        $shouts = mysqli_query($conn, $query);
        if (mysqli_num_rows($shouts) > 0) {
            while ($row = mysqli_fetch_assoc($shouts)) { ?>
            <li class="shout"><span><?php echo $row['time']; ?></span>-<strong><?php echo $row['user']; ?></strong>:<?php echo $row['message']; ?></li>

		<?php
        }
        } ?>
        </ul>
    </div>
    <div id="input">
        <?php if (isset($_GET['error'])): ?>
            <div id="error-msg">
                <?php echo $_GET['error']; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="process.php">
            <input type="text" name="user" placeholder="Enter Yous Name" />
            <input type="text" name="message" placeholder="Enter A Message" />
            <br />
            <input type="submit" name="submit" class="shout-btn" value="Shout It Out" />
        </form>
    </div>
</div>


</body>
</html>