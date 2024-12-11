<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$id = $_GET['id'];
$receipts = $pdo->query("SELECT receipts.*, products.name as aoao FROM receipts JOIN products ON receipts.product_id = products.id WHERE receipts.product_id = '$id'")->fetchAll(PDO::FETCH_ASSOC);
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
<h1>Поступление</h1>
<table>
    <tr>
        <th>#</th>
        <th>Дата</th>
        <th>Продукт</th>
        <th>Количество</th>
    </tr>
    <?php foreach ($receipts as $receipt):?>
        <tr>
            <td><?= $receipt["id"] ?></td>
            <td><?= $receipt["date"] ?></td>
            <td><?= $receipt["aoao"] ?></td>
            <td><?= $receipt["amount"] ?></td>
            <td><a href="/entrance/edit.php?id=<?=$receipt["id"]?>">Изменить</a></td>
            <td><a href="/entrance/actions/delete.php?id=<?=$receipt["id"]?>">Удалить</a></td>
        </tr>
    <?php endforeach;?>
</table>
</body>
</html>
