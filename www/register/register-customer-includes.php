<?php
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password']) 
&& isset($_POST['name']) && isset($_POST['address'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
}
