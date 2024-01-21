<?php
include('config/database.php');

$sql = "SELECT COUNT(*) FROM products";
$stmt = $db->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();
$total_products = $row['COUNT(*)'];

echo $total_products;
?>