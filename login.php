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
            header("Location: recipes.php");
        } else {
            header("Location: MunchiesLogin.php?login=true&message=Invalid username or password.&status=error");
        }
    } else {
        header("Location: MunchiesLogin.php?login=true&message=Invalid username or password.&status=error");
    }
    $stmt->close();
}
$conn->close();
?>