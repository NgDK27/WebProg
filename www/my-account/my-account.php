<?php 
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php?error=notLoggedIn");
}

echo '<h3>' . $_SESSION['username'] .'</h3>';
if ($_SESSION['user-type'] == 1) {
    echo '<h3>Customer</h3>';
    echo '<h3>' . $_SESSION['name'] .'</h3>';
    echo '<h3>' . $_SESSION['address'] .'</h3>';
} elseif (($_SESSION['user-type'] == 2)) {
    echo '<h3>Vendor</h3>';
    echo '<h3>' . $_SESSION['name'] .'</h3>';
    echo '<h3>' . $_SESSION['address'] .'</h3>';
} else {
    echo '<h3>Shipper</h3>';
    echo '<h3>' . $_SESSION['hub'] .'</h3>';
}

?>
<img src="../profile-images/<?php
echo $_SESSION['profile-image'];?>" alt="">
<br>
<div class="form-container">
<form action="my-account-include.php" enctype="multipart/form-data" method="post">
        <div class="mb-3 form-field">
            <label for="profile-image">Change profile images</label>
            <input type="file" id="profile-image" name="profile-image">
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>
<a href="../login/login.php?logout=true">
    Logout
</a>

<?php
include('../includes/footer.php');
?>
