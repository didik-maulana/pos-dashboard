<?php

$sales = (int)$_POST['total_sales'];
$amount = (int)$_POST['amount'];
$discount = (int)$_POST['discount'];

if ($discount == null) {
    $discount = 0;
}

if ($amount == null) {
    $amount = 0;
}

$discounted_sales = $sales - $discount ;
$payment = $amount + $discount;
if ($payment < $_POST['total_sales']) {
    header('Location: ../../insufficient.php');
    exit;
}

include('../../config/database.php');

$sql = "INSERT INTO transaction (sales, discounted_sales, amount, created) VALUES (:sales, :discounted_sales, :amount, NOW())";
$stmt = $db->prepare($sql);
$stmt->bindParam(':sales', $sales);
$stmt->bindParam(':amount', $amount);
$stmt->bindParam(':discounted_sales', $discounted_sales);
$stmt->execute();

$sql = "UPDATE history SET status = 'success' WHERE status = 'draft'";
$stmt = $db->prepare($sql);
$stmt->execute();


if ($stmt->rowCount() > 0) {
    header('Location: ../../transaction_receipt.php?sales='.$sales.'&discount='.$discount.'&amount='.$amount.'&discounted_sales='.$discounted_sales);
    exit;
} else {
    echo 'There was an error saving the transaction.';
}
?>