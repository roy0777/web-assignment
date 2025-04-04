<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    // Optionally redirect or allow non-logged-in users
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        $success_message = "Your message has been sent successfully!";
    } else {
        $error_message = "Failed to send your message. Please try again.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Munchies</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>

    <nav>
        <a href="MunchiesGallery.php">Gallery</a>
        <a href="add_recipe.php">Add Recipe</a>
        <a href="MunchiesContact.php">Contact</a>
        <a href="logout.php">Sign Out</a>
    </nav>

    <div class="content">
    <form method="POST" action="MunchiesContact.php">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
    <button type="submit">Send Message</button>
</form>

        <?php if (isset($success_message)): ?>
            <p style="color: green;"><?php echo $success_message; ?></p>
        <?php elseif (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Munchies Food Gallery. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

<?php $conn->close(); ?>