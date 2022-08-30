<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '2') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<title>View product</title>
<link rel="stylesheet" href="view-product.css">
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

        foreach ($productData as $product) {
            $id = substr($product[0], 0, 14);
            $productName = $product[2];
            $price = $product[3];
            $descript = $product[4];
            $location = "";
            $mydir = '../products-images';
            $myfiles = array_diff(scandir($mydir), array('.', '..'));
            foreach ($myfiles as $filename) {
                if (str_contains($filename, substr($id, 0, 14))) {
                    $location .= $filename;
                    break;
                }
            }
            if ($product[1] == $_SESSION['username']) {
                echo "<li class=\"container-sm d-flex text-center align-items-center align-self-center flex-column rounded shadow outside-box m-4 bg-white\">";
                echo "<div>";
                print_r($productName);
                echo "</div>";
                echo "<div>";
                print_r($price);
                echo "</div>";
                echo "<div>";
                print_r($descript);
                echo "</div>";
                echo "<div>";
                echo '<img src="../products-images/' . $location . '" alt="">';
                echo "</div>";
                echo "</li>";
            }
        }
        ?>
    </ul>
</div>
<?php
include('../includes/footer.php');
?>