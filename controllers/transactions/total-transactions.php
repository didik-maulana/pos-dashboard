<?php
include('config/database.php');

$sql = "SELECT COUNT(*) FROM transaction";
$stmt = $db->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();
$total_transactions = $row['COUNT(*)'];

echo $total_transactions;
?>