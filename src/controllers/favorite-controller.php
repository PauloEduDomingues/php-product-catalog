<?php
require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../repository/favorite-repository.php';

function handleFavoriteActions($pdo) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['favorite'])) {
        $productId = $_POST['product_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $product = [
            'id' => $productId,
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'image' => $image
        ];
    
        addFavorite($pdo, $product);
        
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_favorite'])) {
        $productId = $_POST['product_id'];
        removeFavorite($pdo, $productId);
    }
}
