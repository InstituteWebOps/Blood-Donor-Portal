<?php
$servername = "localhost";
$username = "root";
$password = "12017";

try {
    //make a connection
    $conn = new PDO("mysql:host=$servername;dbname=donors", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>