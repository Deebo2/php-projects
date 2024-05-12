<?php

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    try {
        $host = 'localhost';
        $dbname = 'auth-sys';
        $username = 'root';
        $pass = '';
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass, $options);
    } catch (PDOException $e) {
        echo 'error is'.$e->getMessage();
    }
