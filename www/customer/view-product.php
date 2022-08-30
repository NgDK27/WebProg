<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '1') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<title>View product</title>
<link rel="stylesheet" href="view-product.css">
<div class="container">
    <div id="form-container" class="row mb-5">
        <div class="col-sm-9">
            <form action="view-product.php" method="GET" id="name-search">
                <div>
                    <label for="input-name" class="form-label">Search by enter product name</label>
                    <input type="text" class="form-control w-75" id="input-name" name="input-name">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-lg" id="submit" name="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="">
            <form action="view-product.php" method="GET" id="price-search" class="col-sm">
                <div>
                    <p>or Price Range</p>
                    <input type="number" class="form-control" id="min-price" name="min-price" placeholder="Min">
                    <div>-</div>
                    <input type="number" class="form-control" id="max-price" name="max-price" placeholder="Max">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-lg" id="submit" name="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <h1 class="text-center">PRODUCTS</h1>
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
                        $id = $product[0];
                        $vendor = $product[1];
                        $name = $product[2];
                        $location = "";
                        $mydir = '../products-images';
                        $myfiles = array_diff(scandir($mydir), array('.', '..'));
                        foreach ($myfiles as $filename) {
                            if (str_contains($filename, substr($id, 0, 14))) {
                                $location .= $filename;
                                break;
                            }
                        }
                        $count += 1;
                        echo "<li class=\"container-sm d-flex text-center align-items-center align-self-center flex-column rounded shadow outside-box m-4 bg-white\">";
                        echo "<a href= \"product-detail.php?id=$id\" class=\"text-decoration-none\">";
                        echo "<div>";
                        echo '<img src="../products-images/' . $location . '" alt="">';
                        echo "</div>";
                        echo "<h2>";
                        print_r($name);
                        echo "</h2>";
                        echo "</a>";
                        echo "<div>";
                        echo "<p>₫";
                        print_r($price);
                        echo "</p>";
                        echo "</div>";
                        echo "</li>";
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
                        $id = $product[0];
                        $vendor = $product[1];
                        $name = $product[2];
                        $price = $product[3];
                        $location = "";
                        $mydir = '../products-images';
                        $myfiles = array_diff(scandir($mydir), array('.', '..'));
                        foreach ($myfiles as $filename) {
                            if (str_contains($filename, substr($id, 0, 14))) {
                                $location .= $filename;
                                break;
                            }
                        }
                        echo "<li class=\"container-sm d-flex text-center align-items-center align-self-center flex-column rounded shadow outside-box m-4 bg-white\">";
                        echo "<a href= \"product-detail.php?id=$id\" class=\"text-decoration-none\">";
                        echo "<div>";
                        echo '<img src="../products-images/' . $location . '" alt="">';
                        echo "</div>";
                        echo "<h2>";
                        print_r($name);
                        echo "</h2>";
                        echo "</a>";
                        echo "<div>";
                        echo "<p>₫";
                        print_r($price);
                        echo "</p>";
                        echo "</div>";
                        echo "</li>";
                    }
                }
            } else {
                foreach ($productData as $product) {
                    $id = $product[0];
                    $vendor = $product[1];
                    $name = $product[2];
                    $price = $product[3];
                    $location = "";
                    $mydir = '../products-images';
                    $myfiles = array_diff(scandir($mydir), array('.', '..'));
                    foreach ($myfiles as $filename) {
                        if (str_contains($filename, substr($id, 0, 14))) {
                            $location .= $filename;
                            break;
                        }
                    }
                    echo "<li class=\"container-sm d-flex text-center align-items-center align-self-center flex-column rounded shadow outside-box m-4 bg-white\">";
                    echo "<a href= \"product-detail.php?id=$id\" class=\"text-decoration-none\">";
                    echo "<div>";
                    echo '<img src="../products-images/' . $location . '" alt="">';
                    echo "</div>";
                    echo "<h2>";
                    print_r($name);
                    echo "</h2>";
                    echo "</a>";
                    echo "<div>";
                    echo "<p>₫";
                    print_r($price);
                    echo "</p>";
                    echo "</div>";
                    echo "</li>";
                }
            }
            ?>
        </ul>
    </div>
</div>

<?php
include('../includes/footer.php');
?>