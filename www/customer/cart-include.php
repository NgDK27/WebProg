<title>Cart</title>
<?php
session_start();
if (isset($_POST)) {
    if (count($_POST) !== 0) {
        $readData = fopen('../Data/distributionhub.db', 'r');
        flock($readData, LOCK_SH);
        $hubData = array();
        while ($line = fgetcsv($readData)) {
            $hubData[] = $line;
        }
        fclose($readData);

        $orderId = uniqid('oID');
        $customer = $_SESSION['username'];
        $hub = $hubData[array_rand($hubData)][0];
        $result = [$orderId, $customer, $hub, 'active'];
        foreach ($_POST as $key => $value) {
            $data = $key . ":" . $value;
            array_push($result, $data);
        }

        $writeData = fopen('../Data/order.db', 'a');
        flock($writeData, LOCK_EX);
        fputcsv($writeData, $result);
        flock($writeData, LOCK_UN);
        fclose($writeData);
        header("Location: ../index.php");
    }
    echo "There is no item in your cart";
    echo "<button class='cartBack'>
   <a href='view-product.php'>Go back</a>
   </button>";
}

