<?php

declare(strict_types=1);


function check_booking_errors(){
    if(isset($_SESSION["errors_book"])){
        $errors = $_SESSION["errors_book"];

        echo "<br>";
        echo "<br>";
        echo "<br>";

        foreach($errors as $error){
            echo '<p class="error">' . $error . '</p>';
        }

        
        unset($_SESSION["errors_book"]);
    }
    else if(isset($_GET['book']) && $_GET['book'] === "success"){
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<p class="form-success">Booking successful!</p>';
    }
}