<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Domain\SimpleProductValidator;
use App\Infra\FileProductRepository;

$repository = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();
$service = new ProductService($repository, $validator);

$data = [
    'name' => $_POST['name'] ?? '',
    'price' => $_POST['price'] ?? ''
];

$result = $service->create($data);

if ($result['success']) {
    echo "Produto cadastrado com sucesso! <a href='products.php'>Ver produtos</a>";
} else {
    echo "Erro ao cadastrar:<br>";
    foreach ($result['errors'] as $error) {
        echo "- $error<br>";
    }
    echo "<a href='index.php'>Voltar</a>";
}
