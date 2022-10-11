<?php
    require_once '../../../../db.php';

    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];

    $member_id_for_update = mysqli_real_escape_string($conn, trim($_POST['member_id_for_update']));
    $uo_id_for_update = mysqli_real_escape_string($conn, trim($_POST['uo_id_for_update']));

    $first_name_for_update = mysqli_real_escape_string($conn, trim($_POST['first_name_for_update']));
    $middle_initial_for_update = mysqli_real_escape_string($conn, trim($_POST['middle_initial_for_update']));
    $last_name_for_update = mysqli_real_escape_string($conn, trim($_POST['last_name_for_update']));
    $dept_for_update = mysqli_real_escape_string($conn, trim($_POST['dept_for_update']));
    $cy_for_update = mysqli_real_escape_string($conn, trim($_POST['cy_for_update']));
    $email_for_update = mysqli_real_escape_string($conn, trim($_POST['email_for_update']));
    $contact_for_update = mysqli_real_escape_string($conn, trim($_POST['contact_for_update']));
    $desg_for_update = mysqli_real_escape_string($conn, trim($_POST['desg_for_update']));
    $jd_for_update = mysqli_real_escape_string($conn, trim($_POST['jd_for_update']));

    $new_jd_for_update = date("Y-m-d", strtotime($jd_for_update));
    echo "<script>console.log('new_jd_for_update: " . $new_jd_for_update . "' );</script>";

    $date_today = date("Y-m-d");
    
    if($member_id_for_update){
        $updateMemberSql = "UPDATE user SET first_name = '$first_name_for_update', middle_initial = '$middle_initial_for_update', last_name = '$last_name_for_update', department = '$dept_for_update', course_year = '$cy_for_update', email = '$email_for_update', contact = '$contact_for_update', designation = '$desg_for_update', updated_by = '$user_id', last_updated = '$date_today' WHERE id = $member_id_for_update";
        $updateMemberResult = mysqli_query($conn, $updateMemberSql);
    }
    
    if($uo_id_for_update){
        $updateUserOrgSql = "UPDATE user_organization SET date_joined = '$new_jd_for_update', updated_by = '$user_id', last_updated = '$date_today' WHERE id = $uo_id_for_update";
        $updateUserOrgResult = mysqli_query($conn, $updateUserOrgSql);
    }

    if($uo_id_for_update){
        header("location:../../members?success=true");
    }else{
        echo (mysqli_error($conn));
    }
?>