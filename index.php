<?php

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>id</th><th>email</th><th>fname</th><th>lname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "sql1.njit.edu";  //njit server address
$username = "sg948";
$password = "HfwrZHvX";
$dbname = "sg948";   //database name

try {
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //create connection
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<p>Connected Successfully</p>' . '<br>'; 
    $set = $connect->prepare("SELECT * FROM accounts where id<6");  //sql query created
    $set->execute();
    $record=$set->rowCount();  //count the number of records
    echo '<br>';
    echo "Records affected: $count_rec" . '<br>' . '<br>';    
    

    // set the resulting array to associative
    $result = $set->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($set->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $a) {
    $error_message = $a -> getMessage(); //error handler 
    echo "<p>An error occurred while connecting to the database: $error_message</p>" . '<br>'; 
}
$connect = null; //close connection
echo "</table>";
?>