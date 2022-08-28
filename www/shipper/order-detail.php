<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '3') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}

$readData = fopen('../Data/order.db', 'r');
flock($readData, LOCK_SH);
$orderData = array();
while ($line = fgetcsv($readData)) {
    $orderData[] = $line;
}
fclose($readData);

$orderId = $_GET['id'];

$readData = fopen('../Data/product.db', 'r');
flock($readData, LOCK_SH);
$productData = array();
while ($line = fgetcsv($readData)) {
    $productData[] = $line;
}
fclose($readData);

?>

<title>Order details</title>
<link rel="stylesheet" href="order-detail.css">

<body>
    <h1>Order detail</h1>

    <div id="info-container" class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow p outside-box">
        <?php foreach ($orderData as $order) : ?>
            <?php if ($order[0] == $orderId) : ?>

                <section class="order">
                    <h2 id="id">Order ID</h2>
                    <p><?php echo $order[0] ?></p>

                    <h2 name="user" id="user">User</h2>
                    <p><?php echo $order[1] ?></p>

                    <h2 id="hub">Distribution Hub</h2>
                    <p><?php echo $order[2] ?></p>

                    <h2 name='status'>Order Status</h2>
                    <p id="status"><?php echo $order[3] ?></p>

                    <?php foreach ($order as $orderInfo) : ?>
                        <?php if (str_contains($orderInfo, ':')) : ?>
                            <?php foreach ($productData as $product) : ?>
                                <?php if (str_contains($product[0], substr($orderInfo, 0, 14))) : ?>
                                    <h2 id="product"><?php echo $product[2] . substr($orderInfo, 23, 10); ?></h2>
                                <?php endif ?>
                            <?php endforeach; ?>
                        <?php endif ?>
                    <?php endforeach; ?>

                    <div class="change-status">
                        <?php if ($order[3] == "active") : ?>
                            <p><a href="./order-detail-include.php?status=delivered&id=<?php echo $orderId ?>">Change order status to delivered</a></p>
                            <p><a href="./order-detail-include.php?status=canceled&id=<?php echo $orderId ?>">Change order status to canceled</a></p>
                        <?php endif ?>

                        <?php if ($order[3] == "delivered") : ?>
                            <p><a href="./order-detail-include.php?status=active&id=<?php echo $orderId ?>">Change order status to active</a></p>
                            <p><a href="./order-detail-include.php?status=canceled&id=<?php echo $orderId ?>">Change order status to canceled</a></p>
                        <?php endif ?>

                        <?php if ($order[3] == "canceled") : ?>
                            <p><a href="./order-detail-include.php?status=active&id=<?php echo $orderId ?>">Change order status to active</a></p>
                            <p><a href="./order-detail-include.php?status=delivered&id=<?php echo $orderId ?>">Change order status to delivered</a></p>
                        <?php endif ?>
                    </div>
                </section>

            <?php break;
            endif ?>
        <?php endforeach; ?>
    </div>

    <?php
    include('../includes/footer.php');
    ?>
</body>