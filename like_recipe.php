<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['recipe_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized or missing recipe ID']);
    exit();
}

$user_id = $_SESSION['user_id'];
$recipe_id = $_GET['recipe_id'];

// Check if the recipe is already liked
$check = $conn->prepare("SELECT id FROM likes WHERE user_id = ? AND recipe_id = ?");
$check->bind_param("ii", $user_id, $recipe_id);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    // Unlike the recipe
    $stmt = $conn->prepare("DELETE FROM likes WHERE user_id = ? AND recipe_id = ?");
    $stmt->bind_param("ii", $user_id, $recipe_id);
    if ($stmt->execute()) {
        $message = "Recipe unliked successfully!";
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to unlike recipe']);
        exit();
    }
} else {
    // Like the recipe
    $stmt = $conn->prepare("INSERT INTO likes (user_id, recipe_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $recipe_id);
    if ($stmt->execute()) {
        $message = "Recipe liked successfully!";
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to like recipe']);
        exit();
    }
}

$stmt->close();
$check->close();
echo json_encode(['success' => true, 'message' => $message]);
$conn->close();
?>