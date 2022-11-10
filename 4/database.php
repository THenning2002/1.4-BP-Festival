<?php
    $host = "localhost";
    $dbname = "amerijk";
    $username = "root";
    $password = "";

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $ex) {
        echo "OOPS";

    }
    //database verbinding :)