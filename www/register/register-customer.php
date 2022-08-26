<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="register-shared.css">
<div class="register-form-container">
    <form action="register-customer-include.php" enctype="multipart/form-data" method="post">
        <h1>Register to become a customer</h1>
        <a href="register-shipper.php">Register to become a shipper</a>
        <a href="register-vendor.php">Register to become a vendor</a>
        <div class="">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <!-- <div class=" alert alert-danger length">
                <p>Minimum length of 5 characters</p>
            </div> -->
        </div>

        <div class="">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <!-- <div class=" alert alert-danger pass">
                <p>Password must contains at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&*, NO other kind of characters, has a length from 8 to 20 characters</p>
            </div> -->
        </div>

        <div class="">
            <label for="confirm-password">Confirm password</label>
            <input type="password" id="confirm-password" name="confirm-password">
            <div id="alert-retype-pass">
                <div class="alert alert-danger">
                    <p>Password is not matched</p>
                </div>
            </div>
        </div>

        <div class="">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <!-- <div class=" alert alert-danger length">
                <p>Minimum length of 5 characters</p>
            </div> -->
        </div>

        <div class="">
            <label for="address">Address</label>
            <input type="text" id="address" name="address">
            <!-- <div class=" alert alert-danger length">
                <p>Minimum length of 5 characters</p>
            </div> -->
        </div>

        <div class="">
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