<?php
include 'config.php';

$id = $_GET['id'];


$sql = "DELETE FROM tblproducts WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$stmt->execute();

header("Location: index.php");
exit();
?>