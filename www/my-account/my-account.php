<?php 
session_start();
include('../includes/header.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php?error=notLoggedIn");
}

print_r($_SESSION);
?>
<img src="../profile-images/<?php
echo $_SESSION['profile-image'];?>" alt="">
<br>
<div class="form-container">
<form action="my-account-include.php" enctype="multipart/form-data" method="post">
        <div class="mb-3 form-field">
            <label for="profile-image" class="form-label">Change profile images</label>
            <input class="form-control" type="file" id="profile-image" name="profile-image">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
<a href="../login/login.php?logout=true">
    Logout
</a>

<?php
include('../includes/footer.php');
?>