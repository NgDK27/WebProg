<title>Register</title>
<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="register-shared.css">
<div class="register-form-container">
    <form action="register-shipper-include.php" enctype="multipart/form-data" method="post">
        <h1>Register to become be a shipper</h1>
        <a href="register-customer.php">Register to become a customer</a>
        <a href="register-vendor.php">Register to become a vendor</a>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <div id="alert-username">
                <div class="alert alert-danger">
                    <p>Username must contains only letters (lower and upper case) and digits, has a length from 8 to 15 characters</p>
                </div>
            </div>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <div id="alert-pass">
                <div class="alert alert-danger">
                    <p>Password must contains at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&*, NO other kind of characters, has a length from 8 to 20 characters</p>
                </div>
            </div>
        </div>

        <div>
            <label for="confirm-password">Confirm password</label>
            <input type="password" id="confirm-password" name="confirm-password">
            <div id="alert-retype-pass">
                <div class="alert alert-danger">
                    <p>Password is not matched</p>
                </div>
            </div>
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

                foreach ($hubData as $hub) {
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
<script src="register.js"></script>