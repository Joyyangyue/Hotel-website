<?php

declare(strict_types=1);

function hotel_id(object $pdo, string $placeName){
    $query = ("SELECT id FROM hotel WHERE destination_name = '$placeName';");
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function book(object $pdo, string $placeName, int $guestNumber, string $arrival, string $leaving){
    $result = hotel_id($pdo, $placeName);
    $hotel_id = 0; 
    foreach($result as $id){
        $hotel_id = $id;
        break;
    }
    $query = ("INSERT INTO bookings (user_id, hotel_id, arrival, leaving, guest_number) VALUES (2, :hotel_id, :arrival, :leaving, :guest_number);");
    $stmt = $pdo->prepare($query);    
    //$stmt->bindParam(":user_id", $_SESSION["logged_in_user"]);
    $stmt->bindParam(":hotel_id", $hotel_id);
    $stmt->bindParam(":arrival", $arrival);
    $stmt->bindParam(":leaving", $leaving);
    $stmt->bindParam(":guest_number", $guestNumber);
    $stmt->execute();

    $query = null;
    $stmt = null;

    $query = ("UPDATE hotel SET available_space = available_space - :guest_number WHERE id = :hotel_id;");
    $stmt = $pdo->prepare($query);    
    $stmt->bindParam(":hotel_id", $hotel_id);
    $stmt->bindParam(":guest_number", $guestNumber);
    $stmt->execute();
}

function guestNumber(object $pdo, string $placeName, int $guestNumber){
    $query = ("SELECT available_space FROM hotel WHERE destination_name = '$placeName';");
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $num = 0;

    foreach ($result as $guestNumber) {
        $num = $guestNumber;
        break;
    }

    return $num;
}