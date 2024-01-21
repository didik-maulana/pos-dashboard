<?php

include('config/database.php');

$sql = 'SELECT * FROM history WHERE status != "success"';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {
?>
    <tr>
        <td><?php echo $row['product_id']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['size']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td>Rp<?php echo $row['price']; ?></td>
        <td>
            <button class="btn btn-danger btn-icon-split" type="button" data-bs-target="#confirmation" data-bs-toggle="modal" data-history-id="<?php echo $row['id']; ?>" data-product-id="<?php echo $row['product_id']; ?>" data-qty="<?php echo $row['qty']; ?>"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span><span class="text-white text">Delete</span></button>
        </td>
    </tr>
<?php
}
?>