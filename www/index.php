<?php
session_start();
include './includes/header.php';
?>
<link rel="stylesheet" href="index.css">

<body>

    <div class="bg">
        <div class="container text-center">
            <div class="text">
                <h1>Welcome to LOZODO!</h1>
                <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] == "1") : ?>
                    <a role="button" href="/customer/view-product.php" class="btn btn-primary btn-lg" id="submit">SHOP NOW!</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] == "2") : ?>
                    <a role="button" href="/vendor/view-product.php" class="btn btn-primary btn-lg" id="submit">VIEW PRODUCTS!</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] == "3") : ?>
                    <a role="button" href="/shipper/view-order.php" class="btn btn-primary btn-lg" id="submit">VIEW ORDERS!</a>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <?php
    include './includes/footer.php';
    ?>
</body>