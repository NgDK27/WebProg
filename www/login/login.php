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
<form action="login-include.php" method="POST" >
  <div>
    <label for="username" >Username</label>
    <input type="text"  id="username" name="username">
  </div>
  <div>
    <label for="password" >Password</label>
    <input type="password" id="password" name="password">
  </div>
  <button type="submit" name="submit">Login</button>
</form>
</div>
<a href="../register/register-customer.php">Don't have an account, create one now</a>
<?php
include('../includes/footer.php');
?>