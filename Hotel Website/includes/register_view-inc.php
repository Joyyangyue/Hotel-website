<?php

function check_register_errors()
{
    if(isset($_SESSION["error_signup"])){
        $errors = $_SESSION["error_signup"];

        echo "<br>";

        foreach($errors as $error){
            echo '<p class="error">' . $error . '</p>';
        }

        

        unset($_SESSION["error_signup"]);
    }
    else if(isset($_GET['register']) && $_GET['register'] === "success"){
        echo '<br>';
        echo '<p class="form-success">Login successful!</p>';
    }
}
