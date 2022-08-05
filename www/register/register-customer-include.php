<?php
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password']) 
&& isset($_FILES['profile-image'])&& isset($_POST['name']) && isset($_POST['address'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $name = $_POST['name'];
    $address = $_POST['address'];
    $error = array();

    $readData = fopen('../../accounts.db', 'r');
    flock($readData, LOCK_SH);
    $accountData = array();
    while ($line = fgetcsv($readData)) {
        $accountData[] = $line;
    }
    fclose($readData);
    foreach($accountData as $line) {
        $currentUsername = $line[0];
        if ($username == $currentUsername) {

            array_push($error, "Existed Username");
            break;
        }
    }

    if ($password != $confirmPassword) {
        array_push($error, "Password does not match");
    }

    $passwordCondition = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,20}$/';
    if (!preg_match($passwordCondition, $password)) {
        array_push($error, "Password does not meet the requirement");
    }

    $usernameCondition = '/^[A-Za-z0-9]{8,15}$/';
    if (!preg_match($usernameCondition, $username)) {
        array_push($error, "Username does not meet the requirement");;
    }
    if (count($error) == 0) {
        $fileName = $_FILES['profile-image']['name'];
        $fileExplode = explode('.', $fileName);
        $fileExt = strtolower(end($fileExplode));;
        $newFileName = uniqid('') . "." . $fileExt;
        $fileLocation = '../profileImages/' . $newFileName;
        move_uploaded_file($_FILES['profile-image']["tmp_name"], $fileLocation);
        $imgData = [$username, $newFileName];

        $writeData = fopen('../profileImages/profileImages.db', 'a');
        flock($writeData, LOCK_EX);
        fputcsv($writeData, $imgData);
        flock($writeData, LOCK_UN);
        fclose($writeData);

        $newAccountData = [$username, $password, "1", $name, $address];

        $writeData = fopen('../../accounts.db', 'a');
        flock($writeData, LOCK_EX);
        fputcsv($writeData, $newAccountData);
        flock($writeData, LOCK_UN);
        fclose($writeData);
        header("location: ../login/login.php");
    } else {
        echo "Dit me may loi r";
    }
}
