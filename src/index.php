<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/api/api.php';
require_once __DIR__ . '/controllers/favorite-controller.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$products = [];
$error = '';

handleFavoriteActions($pdo);

$allProducts = fetchProductsFromApi();
if ($allProducts === false) {
    $error = 'Erro ao acessar a API.';
} else {
    if ($search === '') {
        $products = $allProducts;
    } else {
        $products = [];
        foreach ($allProducts as $product) {
            if (
                stripos($product['title'], $search) !== false ||
                stripos($product['description'], $search) !== false
            ) {
                $products[] = $product;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Catálogo de Produtos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Catálogo de Produtos</h1>
        <form method="get">
            <input type="text" name="search" placeholder="Buscar produtos..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Buscar</button>
        </form>

        <?php if ($error): ?>
            <div class="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (!empty($products)): ?>
            <?php
            $favorites = getAllFavorites($pdo);
            $favoriteIds = array_column($favorites, 'product_id');
            ?>
            <?php if ($search !== ''): ?>
                <h2>Resultados para "<?= htmlspecialchars($search) ?>"</h2>
            <?php endif; ?>
            <table>
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <?php if (in_array($product['id'], $favoriteIds)) continue; ?>
                        <tr>
                            <td class="image-cell"><img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['title']) ?>"></td>
                            <td class="title-cell"><?= htmlspecialchars($product['title']) ?></td>
                            <td class="description-cell"><?= htmlspecialchars($product['description']) ?></td>
                            <td class="price-cell">R$ <?= number_format($product['price'], 2, ',', '.') ?></td>
                            <td class="action-cell">
                                <form method="post">
                                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                                    <input type="hidden" name="title" value="<?= htmlspecialchars($product['title']) ?>">
                                    <input type="hidden" name="description" value="<?= htmlspecialchars($product['description']) ?>">
                                    <input type="hidden" name="price" value="<?= htmlspecialchars($product['price']) ?>">
                                    <input type="hidden" name="image" value="<?= htmlspecialchars($product['image']) ?>">
                                    <button type="submit" name="favorite">Favoritar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($search !== '' && empty($products)): ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>

        <?php
        $favorites = getAllFavorites($pdo);
        require __DIR__ . '/views/favorites-list.php';
        ?>
    </div>
</body>

</html>