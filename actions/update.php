<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$id = $_POST['id'];
$date = $_POST['date'];
$product_id = $_POST['product_id'];
$amount = $_POST['amount'];

$pdo->query("UPDATE `receipts` SET `date` = '$date', `product_id` = '$product_id', `amount` = '$amount' WHERE `id` = '$id'");

header('Location: /entrance/');
