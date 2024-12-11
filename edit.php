<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$id = $_GET['id'];

$product = $pdo->query("SELECT * FROM products WHERE id = '$id'")->fetch();
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
<form action="actions/update.php" method="post">
    <input type="hidden" name="id" value="<?=$product['id']?>">
    <input type="text" name="name" placeholder="Название" value="<?=$product["name"]?>">
    <input type="number" name="price" placeholder="Цена"value="<?=$product["price"]?>">
    <input type="number" name="article" placeholder="Артикул"value="<?=$product["article"]?>">
    <input type="submit" name="Добавить">
</form>
</body>
</html>