<title>Register</title>
<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="register-shared.css">
<div class="heading">
    <h1>Register as a Customer</h1>
</div>
<div class="register-form-container">
    <form class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow p outside-box" action="register-customer-include.php" enctype="multipart/form-data" method="post">
        <div class="form-floating mb-4">
            <label for="username" class="register-label">Username*</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Please enter your username">
            <div id="alert-username">
                <div class="alert alert-danger">
                    <p>Username must contains only letters (lower and upper case) and digits, has a length from 8 to 15 characters</p>
                </div>
            </div>
        </div>

        <div class="form-floating mb-4">
            <label for="password" class="register-label">Password*</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Please enter your password">
            <div id="alert-pass">
                <div class="alert alert-danger">
                    <p>Password must contains at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&*, NO other kind of characters, has a length from 8 to 20 characters</p>
                </div>
            </div>
        </div>

        <div class="form-floating mb-4">
            <label for="confirm-password" class="register-label">Confirm password*</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Please confirm your password">
            <div id="alert-retype-pass">
                <div class="alert alert-danger">
                    <p>Password is not matched</p>
                </div>
            </div>
        </div>

        <div class="form-floating mb-4">
            <label for="name" class="register-label">Name*</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Please enter your full name">
            <div id="alert-name">
                <div class="alert alert-danger">
                    <p>Minimum length of 5 characters</p>
                </div>
            </div>
        </div>

        <div class="form-floating mb-4">
            <label for="address" class="register-label">Address*</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Please enter your address">
            <div id="alert-address">
                <div class="alert alert-danger">
                    <p>Minimum length of 5 characters</p>
                </div>
            </div>
        </div>

        <div class="form-floating mb-4">
            <label for="profile-image" class="register-label">Profile Image</label>
            <input type="file" class="form-control" id="profile-image" name="profile-image">
        </div>
        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">Sign Up</button>
        <div>
            <p id="login">
                Already have an account?
            <a href="../login/login.php">Log in</a>
            </p>
        </div>
        <div class="register-others">
            <p>Click <a href="register-shipper.php">here</a> to register as a Shipper</p>
            <p>Click <a href="register-vendor.php">here</a> to register as a Vendor</p>
        </div>
    </form>
</div>
<?php
include('../includes/footer.php');
?>
<script src="register.js"></script>