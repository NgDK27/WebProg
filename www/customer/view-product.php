<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '1') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<div id="form-container">
    <form action="view-product.php" method="GET" id="price-search">
        <div>
            <label for="min-price" class="form-label">Min Price</label>
            <input type="number" class="form-control" id="min-price" name="min-price">
        </div>
        <div>
            <label for="max-price" class="form-label">Max Price</label>
            <input type="number" class="form-control" id="max-price" name="max-price">
        </div>
        <div>
            <button type="submit" class="btn" name="submit">Search</button>
        </div>
    </form>
    <form action="view-product.php" method="GET" id="name-search">
        <div>
            <label for="input-name" class="form-label">Search by enter the name</label>
            <input type="text" class="form-control" id="input-name" name="input-name">
        </div>
        <div>
            <button type="submit" class="btn" name="submit">Search</button>
        </div>
    </form>
</div>
<div id="product-container">
    <ul id="product-list">
        <?php
        $readProductData = fopen("../data/product.db", 'r');
        flock($readProductData, LOCK_SH);
        $productData = array();
        while ($line = fgetcsv($readProductData)) {
            $productData[] = $line;
        }
        fclose($readProductData);

        if ((isset($_GET['min-price']) && isset($_GET['max-price']))) {
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
                    $count += 1;
                }
            }

            if ($count == 0) {
                echo "No result found";
            }
        } else if (isset($_GET['input-name'])) {
            $userInput = strtolower($_GET['input-name']);
            foreach ($productData as $product) {
                $productName = strtolower($product[2]);
                if (str_contains($productName, $userInput)) {
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
        } else {
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
        }
        ?>
    </ul>
</div>
<?php
include('../includes/footer.php');
?>