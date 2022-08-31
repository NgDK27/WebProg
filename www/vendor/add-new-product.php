<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '2') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<title>Add new product</title>
<link rel="stylesheet" href="./add-new-product.css">

<h1>Add a new product to your store</h1>
<div id="add-new-product-container">
    <form class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow p outside-box" action="add-new-product-include.php" enctype="multipart/form-data" method="post">
        <div class="form-floating mb-3">
            <label for="product-name" class="add-new-product-label">Product Name</label>
            <input type="text" class="form-control" id="product-name" name="product-name">
        </div>
        <div class="form-floating mb-3">
            <label for="price" class="add-new-product-label">Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="form-floating mb-3">
            <label for="description" class="add-new-product-label">Description</label>
            <textarea placeholder="Description" class="form-control" id="description" name="description" maxlength="500"></textarea>
        </div>
        <div class="form-floating mb-3">
            <label for="product-image" class="add-new-product-label">Product Images</label>
            <input type="file" class="form-control" id="product-image" name="product-image">
        </div>
        <button type="submit" class="btn btn-primary btn-lg" name="submit" id="submit">Submit</button>
    </form>
</div>
<?php
include('../includes/footer.php');
?>