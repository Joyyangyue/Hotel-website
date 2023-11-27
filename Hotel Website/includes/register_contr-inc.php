<?php

declare(strict_types=1);

function is_input_empty(string $firstName, string $lastName, string $email, string $password, string $passwordAgain){
    if(empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($passwordAgain)){
        return true;
    }
    else {return false;}
}

function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else {return false;}
}

function is_email_taken(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }
    else {return false;}
}

function is_password_tooShort($password){
    if(strlen($password) < 8){
        return true;
    }
    else{return false;}
}

function passwords_dont_match($password, $passwordAgain){
    if ($password != $passwordAgain){
        return true;
    }
    else{return false;}
}