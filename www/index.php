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
                <a role="button" href="/customer/view-product.php" class="btn btn-primary btn-lg" id="submit">SHOP NOW!</a>
            </div>

        </div>
    </div>

    <?php
    include './includes/footer.php';
    ?>
</body>