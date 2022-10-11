<?php
    require_once '../../../../db.php';

    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];

    $u_id = mysqli_real_escape_string($conn, trim($_POST['u_id']));
    $o_id = mysqli_real_escape_string($conn, trim($_POST['o_id']));

    $orgName = mysqli_real_escape_string($conn, trim($_POST['orgName']));
    $orgClassification = mysqli_real_escape_string($conn, trim($_POST['orgClassification']));
    $orgDateCreated = mysqli_real_escape_string($conn, trim($_POST['orgDateCreated']));

    $new_orgDateCreated = date("Y-m-d", strtotime($orgDateCreated));
    echo "<script>console.log('new_orgDateCreated: " . $new_orgDateCreated . "' );</script>";

    $date_today = date("Y-m-d");
    
    if($o_id){
        $updateSettingsSql = "UPDATE organization SET name = '$orgName', org_classification_id = '$orgClassification', org_date_created = '$new_orgDateCreated', updated_by = '$user_id', last_updated = '$date_today' WHERE id = $o_id";
        $updateSettingsResult = mysqli_query($conn, $updateSettingsSql);
    }

    if($updateSettingsResult){
        $_SESSION['org_name'] = $orgName;
        header("location:../../settings?success=true");
    }else{
        echo (mysqli_error($conn));
    }
?>