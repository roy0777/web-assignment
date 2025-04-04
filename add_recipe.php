<?php
session_start();
include 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: MunchiesLogin.php?message=Please log in to access this page.&status=error");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $category = $_POST['category'];

    // Handle image upload
    $image = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    // Insert recipe into the database
    $stmt = $conn->prepare("INSERT INTO recipes (user_id, title, ingredients, instructions, category, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $user_id, $title, $ingredients, $instructions, $category, $image);
    
    if ($stmt->execute()) {
        header("Location: MunchiesGallery.php?message=Recipe added successfully.&status=success");
    } else {
        header("Location: MunchiesGallery.php?message=Failed to add recipe.&status=error");
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe - Munchies</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Add a New Recipe</h1>
    </header>
    
    <nav>
        <a href="MunchiesGallery.php">Gallery</a>
        <a href="add_recipe.php">Add Recipe</a>
        <a href="MunchiesContact.php">Contact</a>
        <a href="logout.php">Sign Out</a>
    </nav>
    
    <div class="content">
    <form method="POST" action="add_recipe.php" enctype="multipart/form-data" class="recipe-form">
    <input type="text" name="title" placeholder="Recipe Title" required>
    <textarea name="ingredients" placeholder="Ingredients (comma separated)" rows="4" required></textarea>
    <textarea name="instructions" placeholder="Instructions" rows="6" required></textarea>
    <select name="category" required>
        <option value="entree">Entree</option>
        <option value="breakfast">Breakfast</option>
        <option value="soup">Soup</option>
        <option value="pastries">Pastries</option>
        <option value="appetizers">Appetizers</option>
        <option value="beverages">Beverages</option>
        <option value="vegetarian">Vegetarian</option>
    </select>
    <input type="file" name="image" accept="image/*">
    <button type="submit">Add Recipe</button>
</form>
    </div>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Munchies Food Gallery. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>