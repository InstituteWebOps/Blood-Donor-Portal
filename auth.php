<?php

session_start();
try {
require('db.php');
print_r($_POST);
$_SESSION['rollno'] = $_POST['rollno'];
header('location: details.php');
//     $con = new PDO("mysql:host=localhost;dbname=signup", "root", "", array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//    //servername,username,password and database name taken as the parameters.
//     if (isset($_POST['login'])) {
//         if (empty($_POST['username']) || empty($_POST['password'])) {
//             $message = "All fields are required";
//         } else {
//             $query = "SELECT * FROM user WHERE username = :username AND password = :password";
//             $statement = $con->prepare($query);
//             $statement->execute(
//             array(
//               'username' => $_POST["username"],
//               'password' => $_POST["password"]
//               )
//               );
//             $count = $statement ->rowCount();
//             echo($count);

//             if ($count>0) {
//                   $message = "Welcome, ".$_POST["username"];
//                   $_SESSION["username"] = $_POST["username"];
//                   header("location: profile.php");
//             } else {
//                   $message = "Wrong Credentials";
//             }
//             // echo($message);
//         }
//     } else {
//       echo "Dude. How did you get here?";
//     }
} catch (PDOException $e) {
    echo "Error" .$e->getMessage();
}
?>