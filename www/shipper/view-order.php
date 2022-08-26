<title>View order</title>
<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username']) || $_SESSION['user-type'] != '3') {
    header("Location: ../my-account/my-account.php?error=invalidaccount");
}
?>

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
<?php
include('../includes/footer.php');
?>