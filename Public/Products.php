<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Domain\SimpleProductValidator;
use App\Infra\FileProductRepository;

$repository = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();
$service = new ProductService($repository, $validator);

$products = $service->list();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Produtos Cadastrados</h1>
    <?php if (empty($products)) : ?>
        <p>Nenhum produto cadastrado.</p>
    <?php else : ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
            <?php foreach ($products as $p) : ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['name']) ?></td>
                <td><?= number_format($p['price'], 2, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <p><a href="index.php">Voltar ao cadastro</a></p>
</body>
</html>
