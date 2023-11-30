<?php

declare(strict_types=1);

function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM user WHERE email = :email;";
    $stmt = $pdo->prepare($query);    
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function register(object $pdo, string $firstName, string $lastName, string $email, string $password){
    $query = ("INSERT INTO user (email, password, first_name, last_name) VALUES (:email, MD5(:password), :firstName, :lastName);");
    $stmt = $pdo->prepare($query);    
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":firstName", $firstName);
    $stmt->bindParam(":lastName", $lastName);
    $stmt->execute();
    
}