<?php
include('../includes/header.php');
?>
<link rel="stylesheet" href="register-shared.css">
<div class="register-form-container">
    <form action="register-customer-includes.php" enctype="multipart/form-data" method="post">
        <h1>Register to buy from our platform</h1>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirm password</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="mb-3">
            <label for="profile-image" class="form-label">Profile Images</label>
            <input class="form-control" type="file" id="profile-image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
<?php
include('../includes/footer.php');
?>