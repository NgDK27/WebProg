<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])) {
    // Read account database
    $readAccountData = fopen('../../accounts.db', 'r');
    flock($readAccountData, LOCK_SH);
    $accountData = array();
    while ($line = fgetcsv($readAccountData)) {
        $accountData[] = $line;
    }
    fclose($readAccountData);

    $accountExisted = false;
    $username;
    $hashedPassword;
    $userType = '0';
    $hub;
    $name;
    $address;
    $imageFile;

    // Looking for account
    foreach($accountData as $account) {
        $currentUsername = $account[0];
        if ($currentUsername == $_POST['username']) {
            $accountExisted = true;
            $username = $account[0];
            $hashedPassword = $account[1];
            $userType = $account[2];
            if ($userType == '3') {
                $hub = $account[3];
                break;
            }
            $name = $account[3];
            $address = $account[4];
            break;
        }
    }

    // Read profile images database
    $readImageData = fopen('../profile-images/profile-images.db', 'r');
    flock($readImageData, LOCK_SH);
    $imageData = array();
    while ($line = fgetcsv($readImageData)) {
        $imageData[] = $line;
    }
    fclose($readImageData);

    // Looking for images
    foreach ($imageData as $image) {
        $currentUsername = $image[0];
        if ($currentUsername == $_POST['username']) {
            $imageFile = $image[1];
            break;
        }
    }

    if ($accountExisted && password_verify($_POST['password'], $hashedPassword)) {
        $_SESSION['username'] = $username;
        $_SESSION['user-type'] = $userType;
        $_SESSION['profile-image'] = $imageFile;
        if ($userType == "3") {
            $_SESSION['hub'] = $hub;
        } else {
            $_SESSION['name'] = $name;
            $_SESSION['address'] = $address;
        }
        header("location: ../index.php");
    } else {
        header("location: ./login.php?error=1");
    }
}