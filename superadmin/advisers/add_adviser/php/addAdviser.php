<?php
    require_once '../../../../db.php';

    $userId = $_SESSION['user_id'];

    $advFirstName = mysqli_real_escape_string($conn, trim($_POST['advFirstName']));
    $advLastName = mysqli_real_escape_string($conn, trim($_POST['advLastName']));
    $advMiddleInitial = mysqli_real_escape_string($conn, trim($_POST['advMiddleInitial']));
    $advEmail = mysqli_real_escape_string($conn, trim($_POST['advEmail']));
    $advContact = mysqli_real_escape_string($conn, trim($_POST['advContact']));
    //$orgList = mysqli_real_escape_string($conn, trim($_POST['orgList']));
    $advJoinedDate = mysqli_real_escape_string($conn, trim($_POST['advJoinedDate']));
    $advPassword = mysqli_real_escape_string($conn, trim($_POST['advPassword']));
        
    $addAdvSql = "INSERT INTO user (user_type_id,first_name,last_name,middle_initial,email,contact,password,created_by) VALUES (4,'$advFirstName','$advLastName','$advMiddleInitial','$advEmail','$advContact',PASSWORD('$advPassword'),'$userId')";

    $addAdvResult = mysqli_query($conn, $addAdvSql);
    //$advId = $conn->insert_id;
    if($addAdvResult){
        header("location:../../?success=true");
        /*$addAdvOrgSql = "INSERT INTO user_organization (user_id,organization_id,date_joined,created_by) VALUES ('$advId','$orgList',STR_TO_DATE('$advJoinedDate','%d-%m-%Y'),'$userId')";
        $addAdvOrgResult = mysqli_query($conn, $addAdvOrgSql);

        if($addAdvOrgResult){
            //header("location:../../?success=true");
        }else{
            echo (mysqli_error($conn));
        }*/
    }else{
        echo (mysqli_error($conn));
    }
?>