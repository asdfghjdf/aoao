<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$products = $pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
$id = $_GET['id'];
$receipt = $pdo->query("SELECT * FROM receipts WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
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
<h1>Добавить товар</h1>
<form action="/entrance/actions/update.php" method="post">
    <input type="hidden" name="id" placeholder="aoaoa" value="<?= $receipt["id"]?>">
    <input type="date" name="date" placeholder="Дата" value="<?= $receipt["date"]?>">
    <select name="product_id" id="">
        <?php foreach ($products as $item):?>
            <option value="<?=$item['id']?>" <?= $item["id"]==$receipt["product_id"]?"selected":""?>><?=$item['name']?></option>
        <?php endforeach;?>
    </select>
    <input type="number" name="amount" placeholder="Кол-во" value="<?= $receipt["amount"]?>">
    <input type="submit" value="Изменить">
</form>
</body>
    </html>
