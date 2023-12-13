<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $placeName = $_POST["place-name"];
    $guestNumber = $_POST["guest-number"];
    $arrival = $_POST["arrival"];
    $leaving = $_POST["leaving"];
    

    try {
        require_once 'dbh-inc.php';
        require_once 'book_model-inc.php';
        require_once 'book_contr-inc.php';

        //error handlers                

        $errors = [];

        //if(!isset($_SESSION["logged_in_user"])){
        //    $errors["not_logged_in"] = "Please log in first!";
        //}

        if (is_input_empty($arrival, $leaving)) {
            $errors["empty_input"] = "Please choose dates!";
        }
        
        

        if(is_guestnumber_wrong($guestNumber)){
            $errors["invalid_guestNum"] = "Please input valid number of guests!";
        }

        if(is_guestnumber_over($pdo, $placeName, $guestNumber)){
            $errors["too_much_guest"] = "There is no room for this many guests!";
        }

        if(are_dates_wrong($arrival, $leaving)){
            $errors["wrong_dates"] = "Dates not available!";
        }

        


        require_once 'config_session-inc.php';
        
        if ($errors){
            $_SESSION ["errors_book"] = $errors;
            header("Location: ../index.php#book");
            
            die();
        }

        logBook($pdo, $placeName, $guestNumber, $arrival, $leaving);

        header("Location: ../index.php?book=success");
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