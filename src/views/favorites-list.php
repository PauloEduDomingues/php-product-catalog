<?php
if (empty($favorites)): ?>
    <p>Nenhum favorito salvo.</p>
<?php else: ?>
    <h2>Favoritos</h2>
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
            <?php foreach ($favorites as $fav): ?>
                <tr>
                    <td class="image-cell"><img src="<?= htmlspecialchars($fav['image']) ?>" alt="<?= htmlspecialchars($fav['title']) ?>"></td>
                    <td class="title-cell"><?= htmlspecialchars($fav['title']) ?></td>
                    <td class="description-cell"><?= htmlspecialchars($fav['description']) ?></td>
                    <td class="price-cell">R$ <?= number_format($fav['price'], 2, ',', '.') ?></td>
                    <td class="action-cell">
                        <form method="post">
                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($fav['product_id']) ?>">
                            <button type="submit" name="remove_favorite">Remover</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
