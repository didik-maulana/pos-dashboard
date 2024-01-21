<?php

include('config/database.php');

$sql = 'SELECT * FROM transaction';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {
?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td>Rp<?php echo $row['sales']; ?></td>
        <td>Rp<?php echo $row['discounted_sales'] - $row['sales']; ?></td>
        <td>Rp<?php echo $row['amount']; ?></td>
        <td>Rp<?php echo $row['discounted_sales']; ?></td>
        <td>Rp<?php echo $row['created']; ?></td>
    </tr>
<?php
}
?>