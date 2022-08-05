<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="register-shared.css">
<div class="register-form-container">
    <form action="register-shipper-include.php" enctype="multipart/form-data" method="post">
        <h1>Register to buy from our platform</h1>
        <a href="register-shipper.php">Register to be a shipper</a>
        <a href="register-vendor.php">Register to be a vendor</a>
        <div class="mb-3 form-field">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3 form-field">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 form-field">
            <label for="confirm-password" class="form-label">Confirm password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password">
        </div>
        <div class="form-floating form-field">
            <select class="form-select" id="shipper-select" name="shipper-select">
                <?php
                 $readData = fopen('../Data/distributionhub.db', 'r');
                 flock($readData, LOCK_SH);
                 $hunData = array();
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
        <div class="mb-3 form-field">
            <label for="profile-image" class="form-label">Profile Images</label>
            <input class="form-control" type="file" id="profile-image" name="profile-image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
<?php
include('../includes/footer.php');
?>