<?php
include 'db_connect.php';

if (!isset($_GET['category'])) {
    header("Location: MunchiesGallery.html");
    exit();
}

$category = $_GET['category'];
$stmt = $conn->prepare("SELECT * FROM recipes WHERE category = ? ORDER BY created_at DESC");
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();
$recipes = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($category); ?> Recipes - Munchies</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><?php echo ucfirst($category); ?> Recipes</h1>
    </header>
    <nav>
        <a href="MunchiesHome.html">Home</a>
        <a href="MunchiesGallery.html">Gallery</a>
        <a href="MunchiesContact.html">Contact</a>
        <a href="MunchiesLogin.php">Sign Up/Login</a>
        <a href="recipes.php">Recipes</a>
    </nav>

    <div class="content">
        <div class="recipe-grid">
            <?php if (count($recipes) > 0): ?>
                <?php foreach ($recipes as $recipe): ?>
                    <div class="recipe-card">
                        <?php if ($recipe['image_path']): ?>
                            <img src="<?php echo htmlspecialchars($recipe['image_path']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>">
                        <?php else: ?>
                            <img src="images/default-recipe.jpg" alt="Default recipe image">
                        <?php endif; ?>
                        <h3><?php echo htmlspecialchars($recipe['title']); ?></h3>
                        <a href="view_recipe.php?id=<?php echo $recipe['id']; ?>" class="view-btn">View Recipe</a>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="like_recipe.php?recipe_id=<?php echo $recipe['id']; ?>" class="like-btn">
                                <?php 
                                // Check if user liked this recipe
                                $check = $conn->prepare("SELECT id FROM likes WHERE user_id = ? AND recipe_id = ?");
                                $check->bind_param("ii", $_SESSION['user_id'], $recipe['id']);
                                $check->execute();
                                $check->store_result();
                                echo $check->num_rows > 0 ? 'Unlike' : 'Like';
                                $check->close();
                                ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No recipes found in this category.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Food Gallery. All rights reserved.</p>
            <p>Follow us on:
                <a href="#">Facebook</a> | 
                <a href="#">Instagram</a> | 
                <a href="#">Twitter</a>
            </p>
        </div>
    </footer>
</body>
</html>
<?php $conn->close(); ?>