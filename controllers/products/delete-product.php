<?php

$product_id = $_POST['product_id'];

include('../../config/database.php');

$sql = 'DELETE FROM products WHERE id = :product_id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    header('Location: ../../products.php');
} else {
    echo 'An error occurred.';
}
?>