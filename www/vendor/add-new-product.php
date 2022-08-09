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
        <div class="mb-3 form-field">
            <label for="product-name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product-name" name="product-name" minlength="10" maxlength="20">
        </div>
        <div class="mb-3 form-field">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Description" id="description" name="description" maxlength="500"></textarea>
            <label for="description">Description</label>
        </div>
        <div class="mb-3 form-field">
            <label for="product-image" class="form-label">Profile Images</label>
            <input class="form-control" type="file" id="product-image" name="product-image">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
<?php
include('../includes/footer.php');
?>