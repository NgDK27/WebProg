<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="register-shared.css">
<div class="register-form-container">
    <form action="register-vendor-include.php" enctype="multipart/form-data" method="post">
        <h1>Register to become a vendor</h1>
        <a href="register-customer.php">Register to become a customer</a>
        <a href="register-shipper.php">Register to become a shipper</a>
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
        <div class="mb-3 form-field">
            <label for="business-name" class="form-label">Business Name</label>
            <input type="text" class="form-control" id="business-name" name="business-name">
        </div>
        <div class="mb-3 form-field">
            <label for="business-address" class="form-label">Business Address</label>
            <input type="text" class="form-control" id="business-address" name="business-address">
        </div>
        <div class="mb-3 form-field">
            <label for="profile-image" class="form-label">Profile Images</label>
            <input class="form-control" type="file" id="profile-image" name="profile-image">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

</div>
<?php
include('../includes/footer.php');
?>
