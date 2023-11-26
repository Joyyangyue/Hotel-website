<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $passwordAgain = $_POST["password-again"];

    try {
        require_once 'dbh-inc.php';
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("Location: ../index.php");
    die();
}