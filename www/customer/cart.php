<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '1') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<title>Cart</title>
<link rel="stylesheet" href="cart.css">

<body>
    <h1>Your Cart</h1>
    <div id="cart-container" class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow p outside-box">
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