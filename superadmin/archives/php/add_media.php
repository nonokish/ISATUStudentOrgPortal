<?php
    require_once '../../../db.php';

    $user_id = $_SESSION['user_id'];
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
        $fileDestination = '../../../organization/admin/archives/media_upload/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $file = $fileNameNew;

        if(strstr($fileType, "video/")){
            $mediaType = "video";
        }else if(strstr($fileType, "image/")){
            $mediaType = "image";
        }
    }

    $addDocumentSql = "INSERT INTO media (file,type,created_by) VALUES ('$file','$mediaType','$user_id')";
    $addDocumentResult = mysqli_query($conn, $addDocumentSql);
    if($addDocumentResult){
        header("location:../?success=true");
    } else{
        echo (mysqli_error($conn));
    }
?>