<title>Register</title>
<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="register-shared.css">
<div class="heading">
    <h1>Register to become a shipper</h1>
</div>
<div class="register-form-container">
    <form class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow p outside-box" action="register-shipper-include.php" enctype="multipart/form-data" method="post">
        <a href="register-customer.php">Register to become a customer</a>
        <a href="register-vendor.php">Register to become a vendor</a>
        <div class="form-floating mb-4">
            <label for="username" class="register-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
            <div id="alert-username">
                <div class="alert alert-danger">
                    <p>Username must contains only letters (lower and upper case) and digits, has a length from 8 to 15 characters</p>
                </div>
            </div>
        </div>

        <div class="form-floating mb-4">
            <label for="password" class="register-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <div id="alert-pass">
                <div class="alert alert-danger">
                    <p>Password must contains at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&*, NO other kind of characters, has a length from 8 to 20 characters</p>
                </div>
            </div>
        </div>

        <div class="form-floating mb-4">
            <label for="confirm-password" class="register-label">Confirm password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password">
            <div id="alert-retype-pass">
                <div class="alert alert-danger">
                    <p>Password is not matched</p>
                </div>
            </div>
        </div>

        <div>
            <label for="shipper-select" class="register-label">Select Distribution Hub</label>
            <select id="shipper-select" class="form-control" name="shipper-select">
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
        </div>
        <div>
            <label for="profile-image" class="register-label">Profile Images</label>
            <input type="file" class="form-control" id="profile-image" name="profile-image">
        </div>
        <button type="submit" name="submit">Submit</button>
        <div>
            <p id="login">
                Already have an account?
            <a href="../login/login.php">Log in</a>
            </p>
        </div>
        <div class="register-others">
            <p>Click <a href="register-customer.php">here</a> to register as a Customer</p>
            <p>Click <a href="register-vendor.php">here</a> to register as a Vendor</p>
        </div>
    </form>

</div>
<?php
include('../includes/footer.php');
?>
<script src="register.js"></script>