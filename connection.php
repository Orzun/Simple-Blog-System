<?php
/* Connecting Database */
try {
    $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $conn = new PDO(
        "mysql:host=localhost;dbname=test",
        "root",
        "",
        $option
    ); // set your own root password (if required)
} catch (PDOException $e) {
    die($e->getMessage());
}
