<?php

declare(strict_types=1);

function is_input_empty(string $arrival, string $leaving){
    if(empty($arrival) || empty($leaving)){
        return true;
    }
    else {return false;}
}

function is_guestnumber_wrong($guestNumber){
    if(intval($guestNumber) == 0 || $guestNumber < 1){
        return true;
    }
    return false;
}

function are_dates_wrong($arrival, $leaving){
    
    if(strtotime($arrival) < strtotime(date("Y-m-d")) || strtotime($leaving) < strtotime($arrival)){
        return true;
    }
    if(strtotime($arrival) >= strtotime($leaving)){
        return true;
    }
    return false;
}

function logBook(object $pdo, string $placeName, int $guestNumber, string $arrival, string $leaving){
    book($pdo, $placeName, $guestNumber, $arrival, $leaving);
}

function is_guestnumber_over(object $pdo, string $placeName, int$guestNumber){
    $guestNum = guestNumber($pdo, $placeName, $guestNumber);
    if($guestNumber > $guestNum){
        return true;
    }
    return false;
}