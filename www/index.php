<?php
session_start();
include './includes/header.php';
?>

<?php if (!$_SESSION) : ?>
<a href="./register/register-customer.php">Register</a>
<a href="./login/login.php">Login</a>
<?php endif ?>
<?php
?>
<?php
include './includes/footer.php';
?>