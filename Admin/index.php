<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: Log-in/');
    exit;
}

include 'db.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busy-Bees Home</title>
    <link rel="stylesheet" href="style.css?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h1>YOU ARE LOGGED IN DONT KNOW WHAT GOES HERE</h1>
</body>
</html>
