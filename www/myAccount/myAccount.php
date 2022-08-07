<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php?error=notLoggedIn");
}

echo $_SESSION['username'];
echo "<br>";
echo $_SESSION['userType'];
echo "<br>";
echo $_SESSION['name'];
echo "<br>";
echo $_SESSION['address'];
echo "<br>";
?>
<img src="../profileImages/<?php
echo $_SESSION['profileImage'];?>" alt="">
<a href="../login/login.php?logout=true">
    Logout
</a>