<?php

function is_input_empty(string $email, string $password){
    if(empty($email) || empty($password)){
        return true;
    }
    else {return false;}
}

function is_username_wrong(bool|array $result){
    if(!$result){
        return true;
    }
    else{
        return false;
    }    
}

function is_password_wrong(string $password, string $cryptedPassword){
    if(md5($password) != $cryptedPassword){
        return true;
    }
    else{
        return false;
    }    
}