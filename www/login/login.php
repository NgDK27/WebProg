<?php
session_start();
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}
if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
include('../includes/header.php');
?>
<link rel="stylesheet" href="login.css">
<div id="login-container">
<form class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow-lg outside-box" action="login-include.php" method="POST" >
  <div class="form-floating mb-3">
    <label for="username" >Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-floating mb-3">
    <label for="password" >Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <a href="../register/register-customer.php">Don't have an account, create one now</a>
  <button type="submit" class="btn btn-primary btn-lg" name="submit">Login</button>
</form>
</div>
<?php
include('../includes/footer.php');
?>