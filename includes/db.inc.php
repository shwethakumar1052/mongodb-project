<?php
    // Use Composer's autoloader
    require_once __DIR__ . '/../vendor/autoload.php'; 

    $connectionString = "mongodb://127.0.0.1:27017";
    $dbName = "mydatabase";

    try {
        $client = new MongoDB\Client($connectionString);
        $conn = $client->$dbName; // We keep the variable name $conn for compatibility
    } catch (Exception $e) {
        die("Could not connect to MongoDB: " . $e->getMessage());
    }
?>
