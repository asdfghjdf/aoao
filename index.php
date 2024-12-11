<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$products = $pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Товары</h1>
<table>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Артикул</th>
    </tr>
    <?php foreach ($products as $product):?>
    <tr>
        <td><?= $product["id"] ?></td>
        <td><?= $product["name"] ?></td>
        <td><?= $product["price"] ?></td>
        <td><?= $product["article"] ?></td>
        <td><a href="edit.php?id=<?=$product["id"]?>">Изменить</a></td>
        <td><a href="actions/delete.php?id=<?=$product["id"]?>">Удалить</a></td>
        <td><a href="/details.php?id=<?=$product["id"]?>">Подробнее</a></td>
    </tr>
    <?php endforeach;?>
    <a href="/create.php">Добавить товар</a>
    <a href="entrance/index.php">Поступления</a>
</table>
</body>
</html>