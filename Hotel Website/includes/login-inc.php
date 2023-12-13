<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    //unset($_SESSION["logged_in_user"]);
    try{

        require_once 'dbh-inc.php';
        require_once 'login_model-inc.php';
        require_once 'login_contr-inc.php';

        //error handlers

        $errors = [];

        if (is_input_empty($email, $password)) {
            $errors["empty_input"] = "All fields must be filled!";
        }

        $result = getUser($pdo, $email);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        if (!is_username_wrong($result) && is_password_wrong($password, $result['password'])) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once 'config_session-inc.php';

        if ($errors){
            $_SESSION ["errors_login"] = $errors;
            header("Location: ../index.php");
            
            die();
        }

        header("Location: ../index.php?login=success");
        //$_SESSION["logged_in_user"] = getUserID($pdo, $email);
        $pdo = null;
        $stmt = null;

        die();
    }
    catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("Location: ../index.php");
    die();
}
