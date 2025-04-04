<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: MunchiesGallery.php");
            exit();
        } else {
            header("Location: MunchiesLogin.php?message=Invalid username or password.&status=error");
            exit();
        }
    } else {
        header("Location: MunchiesLogin.php?message=Invalid username or password.&status=error");
        exit();
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munchies - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Login to Munchies</h1>
    </header>

    <nav>
        <a href="MunchiesHome.html">Home</a>
        <a href="MunchiesLogin.php">Login</a>
        <a href="signup.php">Sign Up</a>
    </nav>

    <div class="content">
    <form method="POST" action="MunchiesLogin.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
        <?php if (isset($_GET['message'])): ?>
            <p style="color: <?php echo $_GET['status'] === 'success' ? 'green' : 'red'; ?>;">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </p>
        <?php endif; ?>
    </div>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Munchies Food Gallery. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>