<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $passwordAgain = $_POST["password-again"];

    try {
        require_once 'dbh-inc.php';
        require_once 'register_model-inc.php';
        require_once 'register_contr-inc.php';

        //error handlers

        $errors = [];

        if (is_input_empty($firstName, $lastName, $email, $password, $passwordAgain)) {
            $errors["empty_input"] = "All fields must be filled!";
        }

        if (is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email!";
        }
        
        if (is_email_taken($pdo, $email)){
            $errors["email_taken"] = "Email already registered!";
        }
        if (is_password_tooShort($password)){
            $errors["password_too_short"] = "Password is too short!";
        }
        if (passwords_dont_match($password, $passwordAgain)){
            $errors["passwords_dont_match"] = "Passwords don't match!";
        }


        require_once 'config_session-inc.php';
        
        if ($errors){
            $_SESSION ["error_signup"] = $errors;
            header("Location: ../index.php");
            
            die();
        }

        registerUser($pdo, $firstName, $lastName, $email, $password);

        header("Location: ../index.php");
        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("Location: ../index.php");
    die();
}