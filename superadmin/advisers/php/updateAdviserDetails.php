<?php
    require_once '../../../db.php';

    $user_id = $_SESSION['user_id'];

    $u_id = mysqli_real_escape_string($conn, trim($_POST['u_id']));
    $uo_id = mysqli_real_escape_string($conn, trim($_POST['uo_id']));

    $first_name_for_update = mysqli_real_escape_string($conn, trim($_POST['first_name_for_update']));
    $middle_initial_for_update = mysqli_real_escape_string($conn, trim($_POST['middle_initial_for_update']));
    $last_name_for_update = mysqli_real_escape_string($conn, trim($_POST['last_name_for_update']));
    $orgList = mysqli_real_escape_string($conn, trim($_POST['orgList']));
    $email_for_update = mysqli_real_escape_string($conn, trim($_POST['email_for_update']));
    $contact_for_update = mysqli_real_escape_string($conn, trim($_POST['contact_for_update']));
    $date_created_for_update = mysqli_real_escape_string($conn, trim($_POST['date_created_for_update']));

    $new_date_created_for_update = date("Y-m-d", strtotime($date_created_for_update));
    echo "<script>console.log('new_date_created_for_update: " . $new_date_created_for_update . "' );</script>";

    $date_today = date("Y-m-d");
    
    if($u_id){
        $updateAdviserSql = "UPDATE user SET first_name = '$first_name_for_update', middle_initial = '$middle_initial_for_update', last_name = '$last_name_for_update', email = '$email_for_update', contact = '$contact_for_update', date_created = '$new_date_created_for_update', updated_by = '$user_id', last_updated = '$date_today' WHERE id = $u_id";
        $updateAdviserResult = mysqli_query($conn, $updateAdviserSql);
    }
    
    if($uo_id){
        $updateAdviserOrgSql = "UPDATE user_organization SET organization_id = '$orgList', updated_by = '$user_id', last_updated = '$date_today' WHERE id = $uo_id";
        $updateAdviserOrgResult = mysqli_query($conn, $updateAdviserOrgSql);
    }

    if($u_id){
        header("location:../../advisers?success=true");
    }else{
        echo (mysqli_error($conn));
    }
?>