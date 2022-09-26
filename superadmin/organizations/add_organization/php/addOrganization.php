<?php
    require_once '../../../../db.php';

    $userId = $_SESSION['user_id'];

    $orgName = mysqli_real_escape_string($conn, trim($_POST['orgName']));
    $orgClassification = mysqli_real_escape_string($conn, trim($_POST['orgClassification']));
    $date_created = mysqli_real_escape_string($conn, trim($_POST['date_created']));
    $adviserlist = mysqli_real_escape_string($conn, trim($_POST['adviserlist']));
    $joined_date = mysqli_real_escape_string($conn, trim($_POST['joined_date']));
        
    $addOrgSql = "INSERT INTO organization (name,org_classification_id,org_date_created,created_by) VALUES ('$orgName','$orgClassification','$date_created','$userId')";

    $addOrgResult = mysqli_query($conn, $addOrgSql);
    $orgId = $conn->insert_id;
    if($addOrgResult){
        $addUserOrgSql = "INSERT INTO user_organization (user_id,organization_id,date_joined,created_by) VALUES ('$adviserlist','$orgId','$joined_date','$userId')";
        $addUserOrgResult = mysqli_query($conn, $addUserOrgSql);

        if($addUserOrgResult){
            header("location:../../?success=true");
        }else{
            echo (mysqli_error($conn));
        }
    }else{
        echo (mysqli_error($conn));
    }
?>