<?php
$product_id = $_POST['product_id'];
$qty = $_POST['item_qty'];

include('../../config/database.php');

$sql = "SELECT product_name, size, price, qty FROM products WHERE id = :product_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();
$row = $stmt->fetch();
$product_name = $row['product_name'];
$size = $row['size'];
$price = $row['price'];
$current_qty = $row['qty'];

if ($current_qty < $qty) {
    header('Location: ../../point-of-sale.php');
    exit;
}

$sql = "SELECT * FROM history WHERE product_id = :product_id AND status = ''";
$stmt = $db->prepare($sql);
$stmt->bindParam(':product_id', $product_id);
$stmt->execute();
$results = $stmt->fetchAll();

if (count($results) == 0) {
    $new_qty = $current_qty - $qty;
    $sql = "UPDATE products SET qty = :new_qty WHERE id = :product_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':new_qty', $new_qty);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();

    $sql = "INSERT INTO history (product_id, product_name, size, qty, price, status, created) VALUES (:product_id, :product_name, :size, :qty, :price, 'draft', NOW())";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':size', $size);
    $stmt->bindParam(':qty', $qty);
    $stmt->bindParam(':price', $price);
    $stmt->execute();
} else {
    $sql = "UPDATE history SET qty = qty + :qty WHERE product_id = :product_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':qty', $qty);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
}

if ($stmt->rowCount() > 0) {
    header('Location: ../../point-of-sale.php');
    exit;
} else {
    echo 'There was an error updating the item in the history.';
}
?>