<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '1') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<div id="product-container">
    <form action="view-product.php" method="GET">
        <div class="mb-3 form-field">
            <label for="min-price" class="form-label">Min Price</label>
            <input type="number" class="form-control" id="min-price" name="min-price">
        </div>
        <div class="mb-3 form-field">
            <label for="max-price" class="form-label">Max Price</label>
            <input type="number" class="form-control" id="max-price" name="max-price">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Search</button>
    </form>
    <ul id="product-list">
        <?php
        $readProductData = fopen("../data/product.db", 'r');
        flock($readProductData, LOCK_SH);
        $productData = array();
        while ($line = fgetcsv($readProductData)) {
            $productData[] = $line;
        }
        fclose($readProductData);
        if (!(isset($_GET['min-price']) && isset($_GET['max-price']))) {
            foreach ($productData as $product) {
                echo "<li>";
                $id = $product[0];
                echo "<a href= \"product-detail.php?id=$id\">";
                echo "<div>";
                print_r($product);
                echo "<div>";
                echo "</a>";
                echo "</li>";
            }
        } else {
            $count = 0;
            foreach ($productData as $product) {
                $price = $product[3];
                if ($price > $_GET['min-price'] && $price < $_GET['max-price']) {
                    echo "<li>";
                    $id = $product[0];
                    echo "<a href= \"product-detail.php?id=$id\">";
                    echo "<div>";
                    print_r($product);
                    echo "<div>";
                    echo "</a>";
                    echo "</li>";
                }
            }

            if ($count == 0) {
                echo "No result found";
            }
        }
        ?>
    </ul>
</div>
<?php
include('../includes/footer.php');
?>