<?php
include 'config.php';

$id = $_GET['id'];


$sql = "SELECT * FROM tblproducts WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE tblproducts SET name = :name, description = :description, price = :price, quantity = :quantity WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':price', $price, PDO::PARAM_INT); 
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT); 
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br><br>
    <label>Description:</label><br>
    <textarea name="description" required><?= htmlspecialchars($product['description']) ?></textarea><br><br>
    <label>Price:</label><br>
    <input type="text" name="price" value="<?= htmlspecialchars($product['price']) ?>" required><br><br>
    <label>Quantity:</label><br>
    <input type="text" name="quantity" value="<?= htmlspecialchars($product['quantity']) ?>" required><br><br>
    <button type="submit">Update Product</button>
</form>

</body>
</html>
