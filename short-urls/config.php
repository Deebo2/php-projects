<?php

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    try {
        $host = 'localhost';
        $dbname = 'short-urls';
        $user = 'root';
        $pass = '';
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, $options);
    } catch (PDOException $e) {
        echo 'error is:'.$e->getMessage();
    }
