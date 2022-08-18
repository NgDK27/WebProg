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
    </div>
    <div class="form-container">
        <form action="cart-include.php" method="POST" id="cart-form">
            <button type="submit" id="complete-order">Complete Order</button>
        </form>
    </div>
</body>




<!-- <script src="addProduct.js"></script> -->
<script src="cart.js"></script>