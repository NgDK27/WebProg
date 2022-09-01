<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOZODO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/includes/shared.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/index.php">LOZODO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="justify-content-end collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (!isset($_SESSION['user-type'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/login/login.php">Login</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] == "1") : ?>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/customer/view-product.php">View product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/customer/cart.php">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/my-account/my-account.php">My account</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] == "2") : ?>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/vendor/view-product.php">View product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/vendor/add-new-product.php">Add new product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/my-account/my-account.php">My account</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] == "3") : ?>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/shipper/view-order.php">View orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="/my-account/my-account.php">My account</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>