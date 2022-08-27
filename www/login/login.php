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
<h1>Welcome to Lozodo, please Login!</h1>
<div id="login-container">
<form class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow p outside-box" action="login-include.php" method="POST" >
  <div class="form-floating mb-3">
    <label for="username" class="login-label" >Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Please enter your username">
  </div>
  
  <div class="form-floating mb-3">
    <label for="password" class="login-label" >Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Please enter your password">
  </div>
  <button type="submit" class="btn btn-primary btn-lg" name="submit" id="submit">Login</button>
  <p id="create-account">
    Not registered?
  <a href="../register/register-customer.php">Create an account</a>
  </p>
</form>
</div>
<?php
include('../includes/footer.php');
?>