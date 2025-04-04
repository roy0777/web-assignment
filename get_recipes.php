<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT title, ingredients, instructions FROM recipes WHERE id = ?");
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    echo json_encode($result);
    $stmt->close();
}
$conn->close();
?>