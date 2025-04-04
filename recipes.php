<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: MunchiesLogin.php?message=Please log in to access this page.&status=error");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle like/unlike
if (isset($_POST['like_recipe'])) {
    $recipe_id = $_POST['recipe_id'];
    $stmt = $conn->prepare("INSERT INTO likes (user_id, recipe_id) VALUES (?, ?) ON DUPLICATE KEY UPDATE user_id=user_id");
    $stmt->bind_param("ii", $user_id, $recipe_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all recipes
$all_recipes = $conn->query("SELECT r.*, COUNT(l.id) as likes, (SELECT COUNT(*) FROM likes WHERE user_id = $user_id AND recipe_id = r.id) as user_liked FROM recipes r LEFT JOIN likes l ON r.id = l.recipe_id GROUP BY r.id");
$user_recipes = $conn->query("SELECT * FROM recipes WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes - Munchies</title>
    <link rel="stylesheet" href="styles.css">
    <script src="recipe.js" defer></script>
</head>
<body>
    <header><h1>All Recipes</h1></header>
    <nav>
        <a href="MunchiesHome.html">Home</a>
        <a href="MunchiesGallery.html">Gallery</a>
        <a href="MunchiesLogin.php">Sign Up/Login</a>
        <a href="recipes.php">Recipes</a>
    </nav>
    <div class="recipe-list">
        <h2>All Recipes</h2>
        <div id="all-recipes">
            <?php while ($row = $all_recipes->fetch_assoc()): ?>
                <div class="recipe-item">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <?php if ($row['image']): ?>
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" style="max-width: 200px;">
                    <?php endif; ?>
                    <p>Category: <?php echo ucfirst($row['category']); ?></p>
                    <p>Likes: <?php echo $row['likes']; ?></p>
                    <form method="POST">
                        <input type="hidden" name="recipe_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="like_recipe" class="like-btn"><?php echo $row['user_liked'] ? 'Unlike' : 'Like'; ?></button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>

        <h2>Your Recipes</h2>
        <div id="user-recipes">
            <?php if ($user_recipes->num_rows > 0): ?>
                <?php while ($row = $user_recipes->fetch_assoc()): ?>
                    <div class="recipe-item">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <?php if ($row['image']): ?>
                            <img src="<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" style="max-width: 200px;">
                        <?php endif; ?>
                        <p>Ingredients: <?php echo htmlspecialchars($row['ingredients']); ?></p>
                        <p>Instructions: <?php echo htmlspecialchars($row['instructions']); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No recipes added yet.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="add-recipe-form">
        <h2>Add Your Own Recipe</h2>
        <form id="recipeForm" method="POST" action="add_recipe.php" enctype="multipart/form-data">
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
    <div class="logout-container">
        <form action="logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>
    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Food Gallery. All rights reserved.</p>
            <p>Follow us on: <a href="#">Facebook</a> | <a href="#">Instagram</a> | <a href="#">Twitter</a></p>
        </div>
    </footer>
</body>
</html>
<?php $conn->close(); ?>