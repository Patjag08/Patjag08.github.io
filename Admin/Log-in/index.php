<?php
include '../db.php';

session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    } else {
        // Check user credentials "SELECT staff_id FROM staff_Accounts WHERE staff_user = ? OR staff_email = ?"
        $stmt = $pdo->prepare("SELECT staff_id, staff_user, staff_password FROM staff_Accounts WHERE staff_user = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['staff_password'])) {
            $_SESSION['user_id'] = $user['staff_id'];
            $_SESSION['username'] = $user['staff_user'];
            header('Location: ../');
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 0 auto; padding: 20px; }
        .error { color: red; margin-bottom: 15px; }
        .success { color: green; margin-bottom: 15px; }
        input { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h2>Login</h2>
    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['registered'])): ?>
        <div class="success">Registration successful! Please login.</div>
    <?php endif; ?>
    <form action="index.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="../Register/">Register here</a>.</p>
</body>
</html>