<?php
    require_once '../../../../../db.php';
    $userID = $_SESSION['user_id'];
    $switchOrgList = mysqli_real_escape_string($conn, trim($_POST['switchOrgList']));

    $sql = "SELECT o.id as org_id FROM organization o WHERE o.id = '$switchOrgList'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $_SESSION['switch_org_id'] = $row['org_id'];
    }

    header("location:../../../");
?>