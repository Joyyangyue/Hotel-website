<?php

declare(strict_types=1);

function getUser(object $pdo, string $email){
    $query = "SELECT * FROM user WHERE email = :email;";
    $stmt = $pdo->prepare($query);    
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getUserID(object $pdo, string $email){
    $query = "SELECT id FROM user WHERE email = :email;";
    $stmt = $pdo->prepare($query);    
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $user_id = 0;

    foreach($result as $id){
        $user_id = $id;
        break;
    }
    return $user_id;
}

