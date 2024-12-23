<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$date = $_POST['date'];
$product_id = $_POST['product_id'];
$amount = $_POST['amount'];

$pdo->query("INSERT INTO `receipts` (`date`, `product_id`, `amount`) VALUES ('$date', '$product_id', '$amount')");

header('Location: /entrance/');