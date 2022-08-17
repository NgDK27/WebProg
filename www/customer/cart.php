<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '1') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>

<div class="cart-container">
    <ul id="item-list">

    </ul>
</div>




<!-- <script src="addProduct.js"></script> -->
<script src="cart.js"></script>