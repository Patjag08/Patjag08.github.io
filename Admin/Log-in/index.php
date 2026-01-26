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
    <title>Busy-Bees Register</title>
    <link rel="stylesheet" href="../../style.css?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <nav style="border-bottom: 2px solid black; z-index=20;" class="navbar sticky-top navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img style="width: 40px;" src="../../Resources/Logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul style="color: #52AC60;" class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../../">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../About Us/">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Contact Us/">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Our Services/">Our Services</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <center><div>
    <h2 class="display-2">Log in</h2>
    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="index.php" style="margin-right: 350px; margin-left: 350px;" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <center><button type="submit" style="background-color: #52AC60; color: white; font-size: 15pt;" class="btn btn-success">Log in</button></center>
    </form>
    <br>
    <center><p>Don't have an account? <a href="../Register/">Register here</a>.</p></center>
    <br>


    <!--PUT TEXT HERE-->


    <footer class="text-center bg-body-tertiary">
        <!-- Grid container -->
        <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
            <a
                data-mdb-ripple-init
                class="btn btn-link btn-floating btn-lg text-body m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><img class="fab fa-facebook-f" src="../../Resources/facebook.png" width="40px"></img
            ></a>
            <!-- Instagram -->
            <a
                data-mdb-ripple-init
                class="btn btn-link btn-floating btn-lg text-body m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><img class="fab fa-instagram" src="../../Resources/instagram.png" width="40px"></img
            ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2025 Copyright:
            <a class="text-body" href="https://github.com/Patjag08">Github.com/Patjag08</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>