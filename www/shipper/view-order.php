<title>View order</title>
<link rel="stylesheet" href="view-order.css">

<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '3') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>

<h1>Active orders</h1>

<div id="info-container" class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow p outside-box">

<?php
$readData = fopen('../Data/order.db', 'r');
flock($readData, LOCK_SH);
$orderData = array();
while ($line = fgetcsv($readData)) {
    $orderData[] = $line;
}
fclose($readData);

foreach ($orderData as $order) {
    if ($_SESSION["hub"] == $order[2]) {
        if ($order[3] == "active") {
            $id = $order[0];
            echo "<li>";
            echo "<a href= \"order-detail.php?id=$id\">";
            echo "<div>";
            print_r($id);
            echo "</div>";
            echo "</a>";
            echo "</li>";
        }
    }
}
?>
</div>

<?php
include('../includes/footer.php');
?>