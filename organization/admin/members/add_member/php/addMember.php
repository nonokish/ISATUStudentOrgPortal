<?php
    require_once '../../../../../db.php';

    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];

    $memberFirstName = mysqli_real_escape_string($conn, trim($_POST['memberFirstName']));
    $memberLastName = mysqli_real_escape_string($conn, trim($_POST['memberLastName']));
    $memberMiddleInitial = mysqli_real_escape_string($conn, trim($_POST['memberMiddleInitial']));
    $memberDepartment = mysqli_real_escape_string($conn, trim($_POST['memberDepartment']));
    $memberCourseYear = mysqli_real_escape_string($conn, trim($_POST['memberCourseYear']));
    $memberEmail = mysqli_real_escape_string($conn, trim($_POST['memberEmail']));
    $memberContact = mysqli_real_escape_string($conn, trim($_POST['memberContact']));
    $memberDesignation = mysqli_real_escape_string($conn, trim($_POST['memberDesignation']));
    $memberDateJoined = mysqli_real_escape_string($conn, trim($_POST['memberDateJoined']));

    $new_memberDateJoined = date("Y-m-d", strtotime($memberDateJoined));
    echo "<script>console.log('new_memberDateJoined: " . $new_memberDateJoined . "' );</script>";

    $memberPassword = mysqli_real_escape_string($conn, trim($_POST['memberPassword']));

    if($memberDesignation && strtolower($memberDesignation) != "member"){
        $user_type_id = 3;
        $finalMemberDesignation = $memberDesignation;
    } else {
        $user_type_id = 1;
        $finalMemberDesignation = "Member";
    }
        
    $addMemberSql = "INSERT INTO user (user_type_id,first_name,last_name,middle_initial,email,contact,designation,password,created_by,course_year,department) VALUES ('$user_type_id','$memberFirstName','$memberLastName','$memberMiddleInitial','$memberEmail','$memberContact','$finalMemberDesignation',PASSWORD('$memberPassword'),'$user_id','$memberCourseYear','$memberDepartment')";

    $addMemberResult = mysqli_query($conn, $addMemberSql);
    $memberId = $conn->insert_id;
    if($addMemberResult){
        $addMemberOrgSql = "INSERT INTO user_organization (user_id,organization_id,date_joined,created_by) VALUES ('$memberId','$org_id','$new_memberDateJoined','$user_id')";
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