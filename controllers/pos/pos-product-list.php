<?php

include('config/database.php');

$sql = 'SELECT * FROM products WHERE qty > 0 ORDER BY product_name ASC';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $row) {
?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['size']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td>Rp<?php echo $row['price']; ?></td>
        <td>
            <button class="btn btn-primary btn-icon-split" type="button" style="margin: 2px;" data-bs-target="#add-item" data-bs-toggle="modal" data-product-id="<?php echo $row['id']; ?>"><span class="text-white text">Sale</span></button>
        </td>
    </tr>
<?php
}

?>