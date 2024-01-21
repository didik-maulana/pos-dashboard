<?php

include('config/database.php');

$current_month = new DateTime();
$current_month_string = $current_month->format('m');

$sql = "SELECT SUM(discounted_sales) AS total_sales FROM transaction WHERE created >= :current_month";
$stmt = $db->prepare($sql);
$stmt->bindParam(':current_month', $current_month_string);
$stmt->execute();

$total_sales = $stmt->fetchColumn();

echo $total_sales ?? 0;
?>