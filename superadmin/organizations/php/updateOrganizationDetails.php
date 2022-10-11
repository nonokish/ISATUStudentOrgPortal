<?php
    require_once '../../../db.php';

    $user_id = $_SESSION['user_id'];

    $org_id_for_update = mysqli_real_escape_string($conn, trim($_POST['org_id_for_update']));
    $uo_id_for_update = mysqli_real_escape_string($conn, trim($_POST['uo_id_for_update']));

    $org_name_for_update = mysqli_real_escape_string($conn, trim($_POST['org_name_for_update']));
    $orgClassification = mysqli_real_escape_string($conn, trim($_POST['orgClassification']));
    $orgAdviser = mysqli_real_escape_string($conn, trim($_POST['orgAdviser']));
    $org_date_created_for_update = mysqli_real_escape_string($conn, trim($_POST['org_date_created_for_update']));

    $new_org_date_created_for_update = date("Y-m-d", strtotime($org_date_created_for_update));
    echo "<script>console.log('new_org_date_created_for_update: " . $new_org_date_created_for_update . "' );</script>";

    $date_today = date("Y-m-d");
    
    if($org_id_for_update){
        $updateOrgSql = "UPDATE organization SET name = '$org_name_for_update', org_classification_id = '$orgClassification', org_date_created = '$new_org_date_created_for_update', updated_by = '$user_id', last_updated = '$date_today' WHERE id = $org_id_for_update";
        $updateOrgResult = mysqli_query($conn, $updateOrgSql);
    }
    
    if($uo_id_for_update){
        $updateUserOrgSql = "UPDATE user_organization SET user_id = '$orgAdviser', updated_by = '$user_id', last_updated = '$date_today' WHERE id = $uo_id_for_update";
        $updateUserOrgResult = mysqli_query($conn, $updateUserOrgSql);
    }

    if($uo_id_for_update){
        header("location:../../organizations?success=true");
    }else{
        echo (mysqli_error($conn));
    }
?>