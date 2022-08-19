<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="register-shared.css">
<div class="register-form-container">
    <form action="register-vendor-include.php" enctype="multipart/form-data" method="post">
        <h1>Register to become a vendor</h1>
        <a href="register-customer.php">Register to become a customer</a>
        <a href="register-shipper.php">Register to become a shipper</a>
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
            <label for="business-name">Business Name</label>
            <input type="text" id="business-name" name="business-name">
        </div>
        <div>
            <label for="business-address">Business Address</label>
            <input type="text" id="business-address" name="business-address">
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
