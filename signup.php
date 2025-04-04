<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: MunchiesLogin.php?message=Registration successful! Please login.&status=success");
    } else {
        header("Location: MunchiesLogin.php?message=Registration failed.&status=error");
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munchies - Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Sign Up for Munchies</h1>
    </header>

    <nav>
        <a href="MunchiesHome.html">Home</a>
        <a href="MunchiesLogin.php">Login</a>
        <a href="signup.php">Sign Up</a>
    </nav>

    <div class="content">
    <form method="POST" action="signup.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Sign Up</button>
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