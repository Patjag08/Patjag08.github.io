<?php

// Database configuration
$server   = "tcp:busybees-server.database.windows.net,1433";
$database = "busybees-sql-db";
$username = "CloudSA47a6ec9b";
$password = "PASSWORDHERE"; // replace with your real password

try {
    $pdo = new PDO(
        "sqlsrv:Server=$server;Database=$database;Encrypt=true;TrustServerCertificate=false;",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>