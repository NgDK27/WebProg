<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="register-shared.css">
<div class="register-form-container">
    <form action="register-shipper-include.php" enctype="multipart/form-data" method="post">
        <h1>Register to buy from our platform</h1>
        <a href="register-shipper.php">Register to be a shipper</a>
        <a href="register-vendor.php">Register to be a vendor</a>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="confirm-password">Confirm password</label>
            <input type="password" id="confirm-password" name="confirm-password">
        </div>
        <div>
            <select id="shipper-select" name="shipper-select">
                <?php
                 $readData = fopen('../Data/distributionhub.db', 'r');
                 flock($readData, LOCK_SH);
                 $hubData = array();
                 while ($line = fgetcsv($readData)) {
                     $hubData[] = $line;
                 }
                 fclose($readData);

                 foreach($hubData as $hub) {
                    echo "<option value=\"$hub[0]\">$hub[1]</option>";
                 }
                ?>
            </select>
            <label for="shipper-select">Select Distribution Hub</label>
        </div>
        <div>
            <label for="profile-image">Profile Images</label>
            <input type="file" id="profile-image" name="profile-image">
        </div>
        <button type="submit" name="submit">Submit</button>
        <div>
            <a href="../login/login.php">Already have an account ? Log in</a>
        </div>
    </form>

</div>
<?php
include('../includes/footer.php');
?>