<?php
if (
    isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password'])
    && isset($_FILES['profile-image']) && isset($_POST['business-name']) && isset($_POST['business-address'])
) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $businessName = $_POST['business-name'];
    $businessAddress = $_POST['business-address'];
    $error = array();

    $readData = fopen('../../accounts.db', 'r');
    flock($readData, LOCK_SH);
    $accountData = array();
    while ($line = fgetcsv($readData)) {
        $accountData[] = $line;
    }
    fclose($readData);
    foreach ($accountData as $line) {
        $currentUsername = $line[0];
        if ($username == $currentUsername) {
            array_push($error, "Existed Username");
            break;
        }
        if ($line[2] == "2") {
            if ($businessName == $line[3]) {
                array_push($error, "Existed Business Name");
            }
            if ($businessAddress == $line[4]) {
                array_push($error, "Existed Business Address");
            }
        }
    }

    if ($password != $confirmPassword) {
        array_push($error, "Password does not match");
    }

    $passwordCondition = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,20}$/';
    if (!preg_match($passwordCondition, $password)) {
        array_push($error, "Password must contains at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&*, NO other kind of characters, has a length from 8 to 20 characters");
    }

    $usernameCondition = '/^[A-Za-z0-9]{8,15}$/';
    if (!preg_match($usernameCondition, $username)) {
        array_push($error, "Username must contains only letters (lower and upper case) and digits, has a length from 8 to 15 characters, unique");
    }
    if (count($error) == 0) {
        $fileName = $_FILES['profile-image']['name'];
        $fileExplode = explode('.', $fileName);
        $fileExt = strtolower(end($fileExplode));;
        $newFileName = uniqid('') . "." . $fileExt;
        $fileLocation = '../profile-images/' . $newFileName;
        move_uploaded_file($_FILES['profile-image']["tmp_name"], $fileLocation);
        $imgData = [$username, $newFileName];

        $writeData = fopen('../profile-images/profile-images.db', 'a');
        flock($writeData, LOCK_EX);
        fputcsv($writeData, $imgData);
        flock($writeData, LOCK_UN);
        fclose($writeData);

        $newAccountData = [$username, $hashedPassword, "2", $businessName, $businessAddress];

        $writeData = fopen('../../accounts.db', 'a');
        flock($writeData, LOCK_EX);
        fputcsv($writeData, $newAccountData);
        flock($writeData, LOCK_UN);
        fclose($writeData);
        header("location: ../login/login.php");
    } else {
        foreach ($error as $lineError) {
            print_r($lineError);
            echo "<br>";
        }
    }
}
?>
<div>
    <a href="register-vendor.php">Go back</a>
</div>