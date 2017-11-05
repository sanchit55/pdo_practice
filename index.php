<?php

$name =  'mysql:host=sql1.njit.edu';
$dbname = 'sg948';
$username = 'sg948';
$password = 'HfwrZHvX';

try {
	$connect = new PDO ($name, $dbname, $username, $password);
	echo "<p>Connection made successfully</p>". '<br>';
	$set= $connect->prepare("SELECT * FROM accounts \n" . "where id<6");
	$set->execute();
	$records=$set->rowCount();
	echo '<br>';
	echo "Number of items with less than id of 6 are: $records". '<br>';
	$set->execute;
	$result= $self->setFetchMode(PDO::FETCH_ASSOC);

	foreach(new tablerows(new recursivearrayiterator($self->fetchall())) as $k=>$v)
	{
		echo $v;
	}
}

catch (PDOException $a) {
	$error_message = $a -> getMessage();
	echo "<p> Error Found while connecting to database: $error_message</p>" . '<br>';
}

 

?>