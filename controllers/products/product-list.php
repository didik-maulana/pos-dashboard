<?php

include('config/database.php');

$sql = 'SELECT * FROM products ORDER BY product_name ASC';
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
        <td><?php echo $row['created']; ?></td>
        <td>
            <button class="btn btn-warning btn-icon-split" type="button" style="margin: 2px;" data-bs-target="#update-product" data-bs-toggle="modal" data-product-id="<?php echo $row['id']; ?>"><span class="text-white-50 icon"><i class="fas fa-exclamation-triangle"></i></span><span class="text-white text">Edit</span></button>
            <button class="btn btn-danger btn-icon-split" type="button" style="margin: 2px;" data-bs-target="#confirmation" data-bs-toggle="modal" data-product-id="<?php echo $row['id']; ?>"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span><span class="text-white text">Delete</span></button>
        </td>
    </tr>
<?php
}
?>