<?php
    require_once '../../../../db.php';

    $userId = $_SESSION['user_id'];

    $orgName = mysqli_real_escape_string($conn, trim($_POST['orgName']));
    $orgClassification = mysqli_real_escape_string($conn, trim($_POST['orgClassification']));
    $date_created = mysqli_real_escape_string($conn, trim($_POST['date_created']));
    $adviserlist = mysqli_real_escape_string($conn, trim($_POST['adviserlist']));
    $joined_date = mysqli_real_escape_string($conn, trim($_POST['joined_date']));

    $new_date_created = date("Y-m-d", strtotime($date_created));

    $new_joined_date = date("Y-m-d", strtotime($joined_date));

    $display_img_name = $_FILES['orgImage']['name'];
    $display_img_size = $_FILES['orgImage']['size'];
    $display_tmp_name = $_FILES['orgImage']['tmp_name'];
    $display_error = $_FILES['orgImage']['error'];
    $display_img_filename = pathinfo($_FILES['orgImage']['name'], PATHINFO_FILENAME);

    $display_img_ex = pathinfo($display_img_name, PATHINFO_EXTENSION);
    $display_img_ex_lc = strtolower($display_img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");

    if(in_array($display_img_ex_lc, $allowed_exs)){
        $display_new_img_name = uniqid("Display-Image-$display_img_filename-", true).'.'.$display_img_ex_lc;
        $display_img_upload_path = '../organization_uploads/'.$display_new_img_name;
        move_uploaded_file($display_tmp_name, $display_img_upload_path);
    } else {
        //$em = "You can't upload files of this type";
        //header("Location: index.php?error=$em");
    }
        
    $addOrgSql = "INSERT INTO organization (org_image,name,org_classification_id,org_date_created,created_by) VALUES ('$display_new_img_name','$orgName','$orgClassification','$new_date_created','$userId')";

    $addOrgResult = mysqli_query($conn, $addOrgSql);
    $orgId = $conn->insert_id;
    if($addOrgResult){
        $addUserOrgSql = "INSERT INTO user_organization (user_id,organization_id,date_joined,is_active,created_by) VALUES ('$adviserlist','$orgId','$new_joined_date',1,'$userId')";
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