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
?>

<body>
    <?php foreach ($orderData as $order) : ?>
        <?php if ($order[0] == $orderId) : ?>
        
        <section class="order">
            <h3 id="id"><?php echo $order[0] ?></h3>
            <h3 name="user" id="user"><?php echo "User: " . $order[1]?></h3>
            <h3 id="hub"><?php echo "Hub: " . $order[2]?></h3>
            <h3 name='status' id="status"><?php echo "Status: " . $order[3]?></h3>

            <a href="./order-detail-include.php?status=delievered&id=<?php echo $orderId ?>">Change to delivered</a>
            <a href="./order-detail-include.php?status=canceled&id=<?php echo $orderId ?>">Change to canceled</a>
            
        </section>

        <?php break; endif ?>
    <?php endforeach; ?>
</body>
