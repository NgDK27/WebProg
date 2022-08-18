<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '2') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<div id="product-container">
    <ul id="product-list">
        <?php
        $readProductData = fopen("../data/product.db", 'r');
        flock($readProductData, LOCK_SH);
        $productData = array();
        while ($line = fgetcsv($readProductData)){
            $productData[] = $line;
        }
        fclose($readProductData);

        foreach ($productData as $product) {
            if ($product[1] == $_SESSION['username']) {
                echo "<li>";
                print_r($product);
                echo "</li>";
            }
        }
        ?>
    </ul>
</div>
<?php
include('../includes/footer.php');
?>