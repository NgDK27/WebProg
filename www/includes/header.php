<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOZODO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/www/includes/shared.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a href="/www/index.php">LOZODO</a>

                <div>
                    <ul class="navbar-nav me-auto my-2 my-lg-0">
                        <?php if (!isset($_SESSION['user-type'])) : ?>
                            <li class="nav-item">
                                <a href="./login/login.php">Login</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] == "1") : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/www/customer/view-product.php">View product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/www/customer/cart.php">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/www/my-account/my-account.php">My account</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] == "2") : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/www/vendor/view-product.php">View product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/www/vendor/add-new-product.php">Add new product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/www/my-account/my-account.php">My account</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user-type']) && $_SESSION['user-type'] == "3") : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/www/shipper/view-order.php">View orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/www/my-account/my-account.php">My account</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>