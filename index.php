<?php

$name =  'mysql:host=sql1.njit.edu';
$dbname = 'sg948';
$username = 'sg948';
$password = 'HfwrZHvX';

try {
	$connect = new PDO ($name, $dbname, $username, $password);
	echo "<p>Connection made successfully</p>". '<br>';
}

catch (PDOException $a) {
	$error_message = $a -> getMessage();
	echo "<p> Error Found while connecting to database: $error_message</p>" . '<br>';
}

?>