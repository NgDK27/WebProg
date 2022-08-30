<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '1') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}

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
<title>Product details</title>
<link rel="stylesheet" href="product-detail.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="product-detail.js"></script>

<body>
    <?php foreach ($productData as $product) : ?>
        <?php if ($product[0] == $productId) : ?>

            <section class="container d-flex bg-white w-75 align-self-center flex-column rounded shadow outside-box">
                <?php $id = $product[0] ?>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="pic">
                            <img name="itemPicPath" id="itemPic" src="../products-images/<?php echo $location; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-sm">
                        <h1 name="itemName" id="itemName"><?php echo $product[2] ?></h1>

                        <span name='itemPrice' id="itemPrice"><?php echo "<h2>₫";
                                                                echo $product[3];
                                                                echo "</h2>" ?></span>
                        <label for="qty" class="quantity"><strong>Quantity:</strong>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                </span>
                                <input type="number" id="qty" name="itemQuantity" class="form-control input-number" value=1 min=1 max=100>
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span>
                            </div>
                            <button class="cart-btn" id="addToCart" href="#" type="submit" role="submit">Add to cart</button>
                        </label>
                    </div>
                    <h3 id="id"><?php echo $id ?></h3>
                </div>
            </section>



        <?php break;
        endif ?>
    <?php endforeach; ?>
    <script src="addProduct.js"></script>
    <?php
    include('../includes/footer.php');
    ?>
</body>