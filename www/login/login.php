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
<form action="login-include.php" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php
include('../includes/footer.php');
?>