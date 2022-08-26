<title>Cart</title>
<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '1') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>

<body>
    <div class="cart-container">
        <ul id="item-list">

        </ul>
        <span id="total">Total price: </span>
    </div>
    <div class="form-container">
        <form action="cart-include.php" method="POST" id="cart-form">
            <button type="submit" id="complete-order">Complete Order</button>
        </form>
    </div>
    <div class="back">
        <button class="backBtn">
            <a href="view-product.php">Continue shopping</a>
        </button>
    </div>

</body>




<!-- <script src="addProduct.js"></script> -->
<script src="cart.js"></script>
<?php
include('../includes/footer.php');
?>