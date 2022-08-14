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

$productId = $_GET['id'];
$id = substr($productId, 0, 14);
$location = '';

$mydir = '../products-images'; 
$myfiles = array_diff(scandir($mydir), array('.', '..')); 
foreach ($myfiles as $filename) {
    if (str_contains($filename, $id)) {
        $location .= $filename;
    }
}
?>

<body>
    <?php foreach ($productData as $product) : ?>
        <?php if ($product[0] == $productId) : ?>
        
            <section class="product">

                <h3 class="name"><?php echo $product[2]?></h3>
                <div class="pic">
                    <img src="../products-images/<?php echo $location;?>" alt="">
                </div>
                <span class="price"><?php echo $product[3]?></span>
                <label for="qty" class="quantity"><strong>Quantity:</strong>
                    <input type="text" id="qty" name="itemQuantity" class="quantity-input" value="1">
                    <button class="cart-btn" href="#" type="submit" role="submit">Add to cart</button>
                </label>
                
            </section>

        <?php break; endif ?>
    <?php endforeach; ?>
    <script type="text/javascript" src="cart.js "></script>
</body>
