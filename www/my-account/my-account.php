<?php
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php?error=notLoggedIn");
}

$readData = fopen('../Data/distributionhub.db', 'r');
flock($readData, LOCK_SH);
$hubData = array();
while ($line = fgetcsv($readData)) {
    $hubData[] = $line;
}
fclose($readData);
?>

<title>My Account</title>
<link rel="stylesheet" href="my-account.css">

<h1>Personal Information</h1>
<div id="info-container" class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow p outside-box">
    <?php
    $username = "Username";
    $address = "Address";
    $name = "Name";
    $hub = "Distribution hub";
    echo '<h2>' . $username . '</h2>', '<p>' . $_SESSION['username'] .'</p>';
    if ($_SESSION['user-type'] == 1) {
        echo '<h2>Account type</h2>';
        echo '<p>Customer</p>';
        echo '<h2>' . $name . '</h2>', '<p>' . $_SESSION['name'] .'</p>';
        echo '<h2>' . $address . '</h2>', '<p>' . $_SESSION['address'] .'</p>';
    } elseif (($_SESSION['user-type'] == 2)) {
        echo '<h2>Account type</h2>';
        echo '<p>Vendor</p>';
        echo '<h2>' . $name . '</h2>', '<p>' . $_SESSION['name'] .'</p>';
        echo '<h2>' . $address . '</h2>', '<p>' . $_SESSION['address'] .'</p>';
    } else {
        echo '<h2>Account type</h2>';
        echo '<p>Shipper</p>';
        foreach ($hubData as $eachHub) {
            if ($eachHub[0] == $_SESSION['hub']) {
                echo '<h2>' . $hub . '</h2>', '<p>' . $eachHub[1] .'</p>';
                break;
            }
        }
    }

    ?>
    <h2>Profile image</h2>
    <img src="../profile-images/<?php
                                echo $_SESSION['profile-image']; ?>" alt="Profile picture">
    <br>
    <div class="form-container">
        <form action="my-account-include.php" enctype="multipart/form-data" method="post">
            <div class="form-floating mb-3">
                <label for="profile-image" class="info-label">Change profile images</label>
                <input type="file" class="form-control" id="profile-image" name="profile-image">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg" name="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>
    <a href="../login/login.php?logout=true">
        Logout
    </a>
</div>

<?php
include('../includes/footer.php');
?>