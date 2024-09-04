<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO tblproducts (name, description, price, quantity) VALUES (:name, :description, :price, :quantity)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':price', $price, PDO::PARAM_INT); 
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT); 
    
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h1>Add New Product</h1>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>
    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>
    <label>Price:</label><br>
    <input type="text" name="price" required><br><br>
    <label>Quantity:</label><br>
    <input type="text" name="quantity" required><br><br>
    <button type="submit">Add Product</button>
</form>

</body>
</html>
