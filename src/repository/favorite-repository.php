<?php

function addFavorite($pdo, $product) {
    $sql = 'INSERT INTO favorites (product_id, title, description, price, image) VALUES (?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        $product['id'],
        $product['title'],
        $product['description'],
        $product['price'],
        $product['image']
    ]);
}

function removeFavorite($pdo, $product_id) {
    $sql = 'DELETE FROM favorites WHERE product_id = ?';
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$product_id]);
}

function getAllFavorites($pdo) {
    $sql = 'SELECT * FROM favorites';
    return $pdo->query($sql)->fetchAll();
}
