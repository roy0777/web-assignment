<?php
session_start();
include 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: MunchiesLogin.php?message=Please log in to access this page.&status=error");
    exit();
}

// Fetch all recipes from the database
$all_recipes = $conn->query("SELECT * FROM recipes");
$user_id = $_SESSION['user_id'];

// Fetch user's favorite recipes
$favorites = $conn->query("SELECT recipe_id FROM likes WHERE user_id = $user_id");
$fav_recipes = [];
while ($row = $favorites->fetch_assoc()) {
    $fav_recipes[] = $row['recipe_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munchies - Gallery</title>
    <link rel="stylesheet" href="styles.css">
    <script src="recipe.js" defer></script>
</head>
<body>
    <header>
        <h1>Recipe Gallery</h1>
    </header>
    
    <nav>
        <a href="MunchiesGallery.php">Gallery</a>
        <a href="add_recipe.php">Add Recipe</a>
        <a href="MunchiesContact.php">Contact</a>
        <a href="logout.php">Sign Out</a>
    </nav>
    
    <div class="gallery">
        <!-- Entree -->
        <div class="category">
            <h2>Entree</h2>
            <div class="image-list">
                <div class="recipe-card" onclick="showRecipe('chicken')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTi4m_b3MvT7yFYfLjTbrUYQbvg7wus7e09qQ&s" alt="Creamy Garlic Chicken" style="width: 75%; height: auto;">
                    <p>Creamy Garlic Chicken</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('pasta')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmTtoh3P2RQbFLrz0O9a8wsnyE0Lh2pCABMg&s" alt="Creamy Mushroom Pasta" style="width: 50%; height: auto;">
                    <p>Creamy Mushroom Pasta</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('salmon')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfhKMBX6FZxdMiN1-X_YdmzYzY6XC2gY7Ulg&s" alt="Garlic Butter Salmon" style="width: 50%; height: auto;">
                    <p>Garlic Butter Salmon</p>
                </div>
            </div>
        </div>
        
        <!-- Breakfast -->
        <div class="category">
            <h2>Breakfast</h2>
            <div class="image-list">
                <div class="recipe-card" onclick="showRecipe('waffles')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu9DQy3AAaIGlRsPYr0pN-KVdGF5O6azOseg&s" alt="Waffles" style="width: 50%; height: auto;">
                    <p>Waffles</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('pancakes')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhm5-no6VNxWyrOEEM34WZn-QJXcXPGQ7ZvQ&s" alt="Pancakes" style="width: 75%; height: auto;">
                    <p>Pancakes</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Cheesy Casserole')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVIhw5_DYMaUJTo0rTKdErgK1KeUO11NOguQ&s" alt="Cheesy Casserole" style="width: 50%; height: auto;">
                    <p>Cheesy Casserole</p>
                </div>
            </div>
        </div>

        <!-- Soup Section -->
        <div class="category">
            <h2>Soup</h2>
            <div class="image-list">
                <div class="recipe-card" onclick="showRecipe('Carrot Soup')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRorHcOtyzlG21UMavM5qqPJWiYJSMof1NihQ&s" alt="Carrot Soup" style="width: 50%; height: auto;">
                    <p>Carrot Soup</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Lentil Soup')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyZ-Zte1TETJ6P5OFNRx6k_uCSeDWnP4SUig&s" alt="Lentil Soup" style="width: 50%; height: auto;">
                    <p>Lentil Soup</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Ham and Potato Soup')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkRw29pBQuw0Rvsu2Jlm0HsURQ_6sUzB31Pg&s" alt="Ham and Potato Soup" style="width: 50%; height: auto;">
                    <p>Ham and Potato Soup</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Tomato Soup')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2XZYlCRP2PTorVq4RCiBT6_dr8tWPXO_3Dw&s" alt="Tomato Soup" style="width: 25%; height: auto;">
                    <p>Tomato Soup</p>
                </div>
            </div>
        </div>

        <!-- Pastries Section -->
        <div class="category">
            <h2>Pastries</h2>
            <div class="image-list">
                <div class="recipe-card" onclick="showRecipe('Fruit Tarts')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSASKeMPJUKyEg7H9eLWzHMXl-iB3ZI9hRnBg&s" alt="Fruit Tarts" style="width: 50%; height: auto;">
                    <p>Fruit Tarts</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Chocolate Mousse')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThRrqz4lBxUY0JK2VPk27pOUYUv17WJifpnA&s" alt="Chocolate Mousse" style="width: 50%; height: auto;">
                    <p>Chocolate Mousse</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Karachi')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKWA0dh1niHaiNSu0wT38QLQW-fGiXZbc19A&s" alt="Karachi" style="width: 50%; height: auto;">
                    <p>Karachi Biryani</p>
                </div>
            </div>
        </div>

        <!-- Appetizer Section -->
        <div class="category">
            <h2>Appetizers</h2>
            <div class="image-list">
                <div class="recipe-card" onclick="showRecipe('Island')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdtoLrclUlJ-XUKzj7S4B6Cixsa8_f4Y3IoQ&s" alt="Island" style="width: 50%; height: auto;">
                    <p>Tropical Shrimp Bites</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Shrimp Cocktail')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIFICWPT1vdepiT2zqbIV7GvugBRAsmU_cFg&s" alt="Shrimp Cocktail" style="width: 50%; height: auto;">
                    <p>Shrimp Cocktail</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Vegetable Skewer')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9Saeh5phtivyslsx6TTV0e4Q0Sye3AjxMVw&s" alt="Vegetable Skewer" style="width: 50%; height: auto;">
                    <p>Vegetable Skewer</p>
                </div>
            </div>
        </div>

        <!-- Beverage Section -->
        <div class="category">
            <h2>Beverages</h2>
            <div class="image-list">
                <div class="recipe-card" onclick="showRecipe('Cold Drinks')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeEykkbYH6jV5Z7eQtN4li446_vgMD_g4E3A&s" alt="Mango Lassi" style="width: 50%; height: auto;">
                    <p>Cold Drinks</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Philippine')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmww5jTG0tVGxjPAoMtgYndRrcCm-NtAjyOQ&s" alt="Adobo" style="width: 50%; height: auto;">
                    <p>Philippine Dish</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Indian')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYU7bkgqtucD8ngwFxlIK-rDPzBR4k-ZIkTA&s" alt="Butter chicken" style="width: 50%; height: auto;">
                    <p>Indian Dish</p>
                </div>
            </div>
        </div>

        <!-- Vegetarian Section -->
        <div class="category">
            <h2>Vegetarian</h2>
            <div class="image-list">
                <div class="recipe-card" onclick="showRecipe('Vegan Tortillas')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUbXm9G6R_EnuafcCpacEnVK6Yd5kVCyJweg&s" alt="Vegan Tortillas" style="width: 50%; height: auto;">
                    <p>Vegan Tortillas</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Vegetable Fritters')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8vBdr68X8X5zxXH9KZDusTpwmw0Pq58TZaw&s" alt="Vegetable Fritters" style="width: 75%; height: auto;">
                    <p>Vegetable Fritters</p>
                </div>
                <div class="recipe-card" onclick="showRecipe('Ratatouille')">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgwSR_EZpz0XbDYtQvaYB8g4answOy6V7X3w&s" alt="Ratatouille" style="width: 75%; height: auto;">
                    <p>Ratatouille</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <h2>Your Favorites</h2>
        <div id="favorites-list">
            <?php if (count($fav_recipes) > 0): ?>
                <ul>
                    <?php foreach ($fav_recipes as $fav_id): ?>
                        <?php
                        $fav_recipe = $conn->query("SELECT title FROM recipes WHERE id = $fav_id");
                        if ($fav_recipe && $fav_recipe->num_rows > 0) {
                            $fav_recipe_data = $fav_recipe->fetch_assoc();
                            ?>
                            <li><?php echo htmlspecialchars($fav_recipe_data['title']); ?></li>
                        <?php } else { ?>
                            <li>Recipe not found.</li>
                        <?php } ?>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No favorite recipes yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recipe Popup Structure -->
    <div id="recipe-popup" class="popup" style="display:none;">
        <div class="popup-content">
            <span class="close" onclick="closeRecipe()">&times;</span>
            <h2 id="recipe-title"></h2>
            <p id="recipe-duration"></p>
            <h3>Ingredients:</h3>
            <ul id="recipe-ingredients"></ul>
            <h3>Instructions:</h3>
            <ol id="recipe-instructions"></ol>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <p>&copy; 2025 Munchies Food Gallery. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

<?php $conn->close(); ?>