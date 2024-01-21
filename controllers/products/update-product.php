<?php

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$size = $_POST['size'];
$price = $_POST['price'];

include('../../config/database.php');

$sql = "SELECT * FROM products WHERE product_name = :product_name AND size = :size";
$stmt = $db->prepare($sql);
$stmt->bindParam(':product_name', $product_name);
$stmt->bindParam(':size', $size);
$stmt->execute();
$results = $stmt->fetchAll();

$sql = "UPDATE products SET product_name = :product_name, size = :size, price = :price WHERE id = :product_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':product_name', $product_name);
$stmt->bindParam(':size', $size);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../../products.php');
} else {
  echo 'Error updating product.';
}
?>