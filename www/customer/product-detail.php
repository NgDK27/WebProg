<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '1') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<?php 
$readProductData = fopen("../data/product.db", 'r');
flock($readProductData, LOCK_SH);
$productData = array();
while ($line = fgetcsv($readProductData)) {
    $productData[] = $line;
}
fclose($readProductData);

$header = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

foreach ($productData as $product) {
    if (str_contains($header, $product[0]) == true) {
        print_r($product);
    }
}
?>