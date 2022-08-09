<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '2') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
if (isset($_POST['product-name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_FILES['product-image'])) {
    $productId = uniqid('', true);
    $vendor = $_SESSION['username'];
    $productName = $_POST['product-name'];
    $productPrice = $_POST['price'];
    $productDescription = $_POST['description'];
    
    $fileName = $_FILES['product-image']['name'];
    $fileExplode = explode('.', $fileName);
    $fileExt = strtolower(end($fileExplode));;
    $newFileName = uniqid('') . "." . $fileExt;
    $fileLocation = '../products-images/' . $newFileName;
    move_uploaded_file($_FILES['product-image']['tmp_name'], $fileLocation);
    $productImgData = [$productId, $newFileName];

    $writeData = fopen('../products-images/products-images.db', 'a');
    flock($writeData, LOCK_EX);
    fputcsv($writeData, $productImgData);
    flock($writeData, LOCK_UN);
    fclose($writeData);

    $productData = [$productId, $vendor, $productName, $productPrice, $productDescription];

    $writeData = fopen('../data/product.db', 'a');
    flock($writeData, LOCK_EX);
    fputcsv($writeData, $productData);
    flock($writeData, LOCK_UN);
    fclose($writeData);

    header("Location: ./add-new-product.php?add=successful");
}