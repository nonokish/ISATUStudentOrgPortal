<?php
    require_once '../../../../db.php';

    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];
    $fileName = $_FILES['media_file']['name'];
    if($fileName){
        $fileTmpName = $_FILES['media_file']['tmp_name'];
        $fileSize = $_FILES['media_file']['size'];
        $fileError = $_FILES['media_file']['error'];
        $fileType = $_FILES['media_file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $fileActualName = $fileExt[0];

        $fileNameNew = $fileActualName.'-'.uniqid('',true).'.'.$fileActualExt;
        $fileDestination = '../media_upload/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $file = $fileNameNew;

        if(strstr($fileType, "video/")){
            $mediaType = "video";
        }else if(strstr($fileType, "image/")){
            $mediaType = "image";
        }
    }

    $addMediaSql = "INSERT INTO media (organization_id,file,type,created_by) VALUES ('$org_id','$file','$mediaType','$user_id')";
    $addMediaResult = mysqli_query($conn, $addMediaSql);
    if($addMediaResult){
        header("location:../?success=true");
    } else{
        echo (mysqli_error($conn));
    }
?>