<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>
    <form action="create.php" method="post">
        <label>Nome: <input type="text" name="name" required></label><br><br>
        <label>Preço: <input type="number" step="0.01" name="price" required></label><br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="products.php">Ver Produtos</a></p>
</body>
</html>
