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

    $display_img_name = $_FILES['orgImage_for_update']['name'];
    $display_img_size = $_FILES['orgImage_for_update']['size'];
    $display_tmp_name = $_FILES['orgImage_for_update']['tmp_name'];
    $display_error = $_FILES['orgImage_for_update']['error'];
    $display_img_filename = pathinfo($_FILES['orgImage_for_update']['name'], PATHINFO_FILENAME);

    $display_img_ex = pathinfo($display_img_name, PATHINFO_EXTENSION);
    $display_img_ex_lc = strtolower($display_img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");

    if(in_array($display_img_ex_lc, $allowed_exs)){
        $display_new_img_name = uniqid("Display-Image-$display_img_filename-", true).'.'.$display_img_ex_lc;
        $display_img_upload_path = '../add_organization/organization_uploads/'.$display_new_img_name;
        move_uploaded_file($display_tmp_name, $display_img_upload_path);
    } else {
        //$em = "You can't upload files of this type";
        //header("Location: index.php?error=$em");
    }
    
    if($org_id_for_update){
        $updateOrgSql = "UPDATE organization SET name = '$org_name_for_update', org_classification_id = '$orgClassification', org_date_created = '$new_org_date_created_for_update', updated_by = '$user_id', last_updated = '$date_today', org_image = '$display_new_img_name' WHERE id = $org_id_for_update";
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