<?php
include 'config.php';


$sql = "SELECT * FROM tblproducts";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple CRUD</title>
</head>
<body>

<h1>Product List</h1>

<a href="create.php">Add New Product</a>
<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </tr>
    <?php foreach ($products as $product) : ?>
        <tr>
            <td><?= htmlspecialchars($product['id']) ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= htmlspecialchars($product['description']) ?></td>
            <td><?= htmlspecialchars($product['price']) ?></td>
            <td><?= htmlspecialchars($product['quantity']) ?></td>
            <td><?= htmlspecialchars($product['created_at']) ?></td>
            <td><?= htmlspecialchars($product['updated_at']) ?></td>
            <td>
                <a href="edit.php?id=<?= htmlspecialchars($product['id']) ?>">Edit</a>
                <a href="delete.php?id=<?= htmlspecialchars($product['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
