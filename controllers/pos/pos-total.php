<?php

include('config/database.php');

$total_price = 0;

$sql = 'SELECT * FROM history WHERE status != "success"';
$stmt = $db->prepare($sql);
$stmt->execute();


while ($row = $stmt->fetch()) {
    $product_id = $row['product_id'];
    $qty = $row['qty'];
    $price = $row['price'];

    $total_price += $qty * $price;
}

echo "$total_price";

?>