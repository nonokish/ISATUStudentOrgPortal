<?php
    require_once '../../../../../db.php';

    $userId = $_SESSION['user_id'];

    $memberFirstName = mysqli_real_escape_string($conn, trim($_POST['memberFirstName']));
    $memberLastName = mysqli_real_escape_string($conn, trim($_POST['memberLastName']));
    $memberMiddleInitial = mysqli_real_escape_string($conn, trim($_POST['memberMiddleInitial']));
    $memberDepartment = mysqli_real_escape_string($conn, trim($_POST['memberDepartment']));
    $memberCourseYear = mysqli_real_escape_string($conn, trim($_POST['memberCourseYear']));
    $memberEmail = mysqli_real_escape_string($conn, trim($_POST['memberEmail']));
    $memberContact = mysqli_real_escape_string($conn, trim($_POST['memberContact']));
    $memberDateJoined = mysqli_real_escape_string($conn, trim($_POST['memberDateJoined']));
    $memberPassword = mysqli_real_escape_string($conn, trim($_POST['memberPassword']));
        
    $addMemberSql = "INSERT INTO user (user_type_id,first_name,last_name,middle_initial,email,contact,password,created_by,course_year,department) VALUES (1,'$memberFirstName','$memberLastName','$memberMiddleInitial','$memberEmail','$memberContact',PASSWORD('$memberPassword'),'$userId','$memberCourseYear','$memberDepartment')";

    $addMemberResult = mysqli_query($conn, $addMemberSql);
    $memberId = $conn->insert_id;
    if($addMemberResult){
        $addMemberOrgSql = "INSERT INTO user_organization (user_id,organization_id,date_joined,created_by) VALUES ('$memberId',1,'$memberDateJoined','$userId')";
        $addMemberOrgResult = mysqli_query($conn, $addMemberOrgSql);

        if($addMemberOrgResult){
            header("location:../../?success=true");
        }else{
            echo (mysqli_error($conn));
        }
    }else{
        echo (mysqli_error($conn));
    }
?>