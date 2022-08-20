<?php
if (isset($_GET["status"]) && isset($_GET["id"])) {
    $readData = fopen('../Data/order.db', 'r');
    flock($readData, LOCK_SH);
    $orderData = array();
    while ($line = fgetcsv($readData)) {
        $orderData[] = $line;
    }
    fclose($readData);

    for ($i = 0; $i < count($orderData); $i++) {
        if ($orderData[$i][0] == $_GET['id']) {
            $orderData[$i][3] = $_GET["status"];
            break;
        }
    }

    $writeData = fopen('../Data/order.db', 'w');
    flock($writeData, LOCK_EX);
    foreach ($orderData as $order) {
        fputcsv($writeData, $order);    
    }
    flock($writeData, LOCK_UN);
    fclose($writeData);
    header("Location: order-detail.php?id=".$_GET['id']);

}
?>