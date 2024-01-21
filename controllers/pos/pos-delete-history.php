<?php

$history_id = $_POST['history_id'];
$product_id = $_POST['product_id'];
$qty = $_POST['product_qty'];

include('../../config/database.php');

$sql = 'DELETE FROM history WHERE id = :history_id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':history_id', $history_id);
$stmt->execute();

$sql = "SELECT qty FROM products WHERE id = :product_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();
$row = $stmt->fetch();
$current_qty = $row['qty'];

$new_qty = $current_qty + $qty;
$sql = "UPDATE products SET qty = :new_qty WHERE id = :product_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':new_qty', $new_qty);
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../../point-of-sale.php');
} else {
    echo 'An error occurred.';
}
?>