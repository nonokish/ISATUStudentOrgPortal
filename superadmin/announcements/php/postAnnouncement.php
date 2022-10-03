<?php
    require_once '../../../db.php';

    $userId = $_SESSION['user_id'];

    $ann_title = mysqli_real_escape_string($conn, trim($_POST['ann_title']));
    $pub_date = mysqli_real_escape_string($conn, trim($_POST['pub_date']));

    $new_pub_date = date("Y-m-d", strtotime($pub_date));
    echo "<script>console.log('new_pub_date: " . $new_pub_date . "' );</script>";

    $org_list = mysqli_real_escape_string($conn, trim($_POST['org_list']));
    $ann_content = mysqli_real_escape_string($conn, trim($_POST['ann_content']));

    $display_img_name = $_FILES['ann_display_image']['name'];
    $display_img_size = $_FILES['ann_display_image']['size'];
    $display_tmp_name = $_FILES['ann_display_image']['tmp_name'];
    $display_error = $_FILES['ann_display_image']['error'];
    $display_img_filename = pathinfo($_FILES['ann_display_image']['name'], PATHINFO_FILENAME);

    $display_img_ex = pathinfo($display_img_name, PATHINFO_EXTENSION);
    $display_img_ex_lc = strtolower($display_img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");

    if(in_array($display_img_ex_lc, $allowed_exs)){
        $display_new_img_name = uniqid("$ann_title-Display-Image-$display_img_filename-", true).'.'.$display_img_ex_lc;
        echo "<script>console.log('display_new_img_name: " . $display_new_img_name . "' );</script>";
        $display_img_upload_path = '../../../organization/admin/announcements/announcement_uploads/'.$display_new_img_name;
        move_uploaded_file($display_tmp_name, $display_img_upload_path);
    } else {
        //$em = "You can't upload files of this type";
        //header("Location: index.php?error=$em");
    }

    /*$article_img_name = $_FILES['ann_article_image']['name'];
    $article_img_size = $_FILES['ann_article_image']['size'];
    $article_tmp_name = $_FILES['ann_article_image']['tmp_name'];
    $article_error = $_FILES['ann_article_image']['error'];

    $article_img_ex = pathinfo($article_img_name, PATHINFO_EXTENSION);
    $article_img_ex_lc = strtolower($article_img_ex);

    if(in_array($article_img_ex_lc, $allowed_exs)){
        $article_new_img_name = uniqid("Article-Image-", true).'.'.$article_img_ex_lc;
        $article_img_upload_path = '../announcement_uploads/'.$article_new_img_name;
        move_uploaded_file($article_tmp_name, $article_img_upload_path);
    } else {
        //$em = "You can't upload files of this type";
        //header("Location: index.php?error=$em");
    }*/
        
    $addAnnouncementSql = "INSERT INTO announcement (title,content,publish_date,display_image,created_by) VALUES ('$ann_title','$ann_content','$new_pub_date','$display_new_img_name','$userId')";

    $addAnnouncementResult = mysqli_query($conn, $addAnnouncementSql);
    $announcementId = $conn->insert_id;
    if($addAnnouncementResult){
        $addOrgAnnouncementSql = "INSERT INTO organization_announcement (organization_id,announcement_id,created_by) VALUES ('$org_list','$announcementId','$userId')";
        $addOrgAnnouncementResult = mysqli_query($conn, $addOrgAnnouncementSql);

        if($addOrgAnnouncementResult){
            header("location:../?success=true");
        }else{
            echo (mysqli_error($conn));
        }
    }else{
        echo (mysqli_error($conn));
    }
?>