
<?php

define('HOST_NAME', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'shoutit');

$conn = mysqli_connect(HOST_NAME, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
    die('connection faild:'.mysqli_connect_errno().'<br>'.mysqli_connect_error());
}

?>




