<?php
    require_once '../../../../db.php';

    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];
    $fileName = $_FILES['document_file']['name'];
    if($fileName){
        $fileTmpName = $_FILES['document_file']['tmp_name'];
        $fileSize = $_FILES['document_file']['size'];
        $fileError = $_FILES['document_file']['error'];
        $fileType = $_FILES['document_file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $fileActualName = $fileExt[0];

        $fileNameNew = $fileActualName.'-'.uniqid('',true).'.'.$fileActualExt;
        $fileDestination = '../document_upload/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $file = $fileNameNew;
    }
    $document_name = mysqli_real_escape_string($conn, trim($_POST['document_name']));
    $document_description = mysqli_real_escape_string($conn, trim($_POST['document_description']));

    $addDocumentSql = "INSERT INTO document (organization_id,document_name,description,file,is_active,created_by) VALUES ('$org_id','$document_name','$document_description','$file',1,'$user_id')";
    $addDocumentResult = mysqli_query($conn, $addDocumentSql);
    if($addDocumentResult){
        header("location:../?success=true");
    } else{
        echo (mysqli_error($conn));
    }
?>