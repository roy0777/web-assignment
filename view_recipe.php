<?php
include 'db_connect.php';
session_start();

if (!isset($_GET['id'])) {
    header("Location: MunchiesGallery.html");
    exit();
}

$recipe_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM recipes WHERE id = ?");
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: MunchiesGallery.html");
    exit();
}

$recipe = $result->fetch_assoc();
$stmt->close();

// Check if user liked this recipe
$is_liked = false;
if (isset($_SESSION['user_id'])) {
    $check = $conn->prepare("SELECT id FROM likes WHERE user_id = ? AND recipe_id = ?");
    $check->bind_param("ii", $_SESSION['user_id'], $recipe_id);
    $check->execute();
    $check->store_result();
    $is_liked = $check->num_rows > 0;
    $check->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($recipe['title']); ?> - Munchies</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($recipe['title']); ?></h1>
    </header>
    <nav>
        <a href="MunchiesHome.html">Home</a>
        <a href="MunchiesGallery.html">Gallery</a>
        <a href="MunchiesLogin.php">Sign Up/Login</a>
        <a href="recipes.php">Recipes</a>
    </nav>

    <div class="content recipe-view">
        <div class="recipe-image">
            <?php if ($recipe['image']): ?>
                <img src="<?php echo htmlspecialchars($recipe['image']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>">
            <?php else: ?>
                <img src="images/default-recipe.jpg" alt="Default recipe image">
            <?php endif; ?>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="like_recipe.php?recipe_id=<?php echo $recipe['id']; ?>" class="like-btn">
                    <?php echo $is_liked ? 'Unlike' : 'Like'; ?>
                </a>
            <?php endif; ?>
        </div>

        <div class="recipe-details">
            <p class="category">Category: <?php echo ucfirst(htmlspecialchars($recipe['category'])); ?></p>
            
            <h3>Ingredients</h3>
            <div class="ingredients">
                <?php echo nl2br(htmlspecialchars($recipe['ingredients'])); ?>
            </div>
            
            <h3>Instructions</h3>
            <div class="instructions">
                <?php echo nl2br(htmlspecialchars($recipe['instructions'])); ?>
            </div>
        </div>
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