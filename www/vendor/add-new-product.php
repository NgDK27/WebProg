<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '2') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<link rel="stylesheet" href="./add-new-product.css">
<div id="add-new-product-container">
    <form action="add-new-product-include.php" enctype="multipart/form-data" method="post">
        <h1>Add a new product to your store</h1>
        <div>
            <label for="product-name">Product Name</label>
            <input type="text" id="product-name" name="product-name" minlength="10" maxlength="20">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" id="price" name="price">
        </div>
        <div class="form-floating">
            <textarea placeholder="Description" id="description" name="description" maxlength="500"></textarea>
            <label for="description">Description</label>
        </div>
        <div>
            <label for="product-image">Profile Images</label>
            <input type="file" id="product-image" name="product-image">
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>
<?php
include('../includes/footer.php');
?>