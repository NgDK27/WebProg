<?php
session_start();
if (isset($_SESSION['username'])) {
    $currentUser = $_SESSION['username'];
    $readData = fopen('../profile-images/profile-images.db', 'r');
    flock($readData, LOCK_SH);
    $profileImagesData = array();
    while ($line = fgetcsv($readData)) {
        $profileImagesData[] = $line;
    }
    fclose($readData);
    $changed = false;

    for ($i=0; $i < count($profileImagesData); $i++) { 
        if ($profileImagesData[$i][0] == $currentUser) {
            $fileName = $_FILES['profile-image']['name'];
            if (!empty($fileName)) {
                $fileExplode = explode('.', $fileName);
                $fileExt = strtolower(end($fileExplode));;
                $newFileName = uniqid('') . "." . $fileExt;
                $fileLocation = '../profile-images/' . $newFileName;
                move_uploaded_file($_FILES['profile-image']['tmp_name'], $fileLocation);
                $profileImage[1] = $newFileName;
                $profileImagesData[$i][1] = $newFileName;
                $_SESSION['profile-image'] = $newFileName;
                $changed = true;
            } else {
                    header("Location: ./my-account.php?changeppf=fail");
            }
        
        }
    }

    $writeData = fopen('../profile-images/profile-images.db', 'w');
    flock($writeData, LOCK_EX);
    foreach ($profileImagesData as $profileImage) {
        fputcsv($writeData, $profileImage);
    }
    flock($writeData, LOCK_UN);
    fclose($writeData);
    if ($changed) {
        header("Location: ./my-account.php");
    }
} else {
    print_r($_SESSION);
    print_r($_POST);
}
?>