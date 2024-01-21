<?php
include('../../config/database.php');

$product_name = $_POST['product_name'];
$size = $_POST['size'];
$qty = $_POST['qty'];
$price = $_POST['price'];

$sql = "SELECT * FROM products WHERE product_name = :product_name AND size = :size";
$stmt = $db->prepare($sql);
$stmt->bindParam(':size', $size);
$stmt->bindParam(':product_name', $product_name);
$stmt->execute();
$results = $stmt->fetchAll();

$stmt = $db->prepare('INSERT INTO products (product_name, size, qty, price, created) VALUES (:product_name, :size, :qty, :price, NOW())');
$stmt->bindParam(':product_name', $product_name);
$stmt->bindParam(':size', $size);
$stmt->bindParam(':qty', $qty);
$stmt->bindParam(':price', $price);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../../products.php');
} else {
    echo 'An error occurred.';
}
?>