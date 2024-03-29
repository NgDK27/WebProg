<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '1') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>
<link rel="stylesheet" href="cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<h1 class="text-center">Your Cart</h1>
<div class="container">

    <div class="row">
        <div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5">
            <div id="cart-container" class="container-sm p-4 d-flex align-self-center flex-column rounded shadow p outside-box bg-white">
                <div>
                    <ul id="item-list">
                        <li>
                            <h2>Total item(s): <span id="totalItems"></span></h2>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5">
            <div id="checkout-container" class="container-sm p-3 d-flex align-self-top flex-column rounded shadow p outside-box bg-white">
                <div class="d-flex justify-content-between">
                    <p>Total price:
                    <p>₫<span id="total"></span></p>
                </div>
                <div class="form-container align-items-center align-self-center">

                    <form action="cart-include.php" method="POST" id="cart-form">
                        <button type="submit" class="btn btn-primary btn-lg" id="complete-order">Complete Order</button>
                    </form>
                </div>
                <p class="text-center mb-0">or</p>
                <a href="view-product.php" class="text-center" id="continue">Continue Shopping</a>
            </div>

        </div>
    </div>
</div>

<script src="cart.js"></script>
<?php
include('../includes/footer.php');
?>