<?php
    require_once '../../../../db.php';

    $userId = $_SESSION['user_id'];

    $pub_date = mysqli_real_escape_string($conn, trim($_POST['pub_date']));
    $pub_time = mysqli_real_escape_string($conn, trim($_POST['pub_time']));

    $new_pub_date = date("Y-m-d", strtotime($pub_date));
    echo "<script>console.log('new_pub_date: " . $new_pub_date . "' );</script>";

    $org_list = mysqli_real_escape_string($conn, trim($_POST['org_list']));
    $newsfeed_caption = mysqli_real_escape_string($conn, trim($_POST['newsfeed_caption']));

    $display_img_name = $_FILES['newsfeed_display_image']['name'];
    $display_img_size = $_FILES['newsfeed_display_image']['size'];
    $display_tmp_name = $_FILES['newsfeed_display_image']['tmp_name'];
    $display_error = $_FILES['newsfeed_display_image']['error'];
    $display_img_filename = pathinfo($_FILES['newsfeed_display_image']['name'], PATHINFO_FILENAME);

    $display_img_ex = pathinfo($display_img_name, PATHINFO_EXTENSION);
    $display_img_ex_lc = strtolower($display_img_ex);
    $allowed_exs = array("jpg", "jpeg", "png");

    if(in_array($display_img_ex_lc, $allowed_exs)){
        // use caption not ann_title
        $display_new_img_name = uniqid("$newsfeed_caption-Display-Image-$display_img_filename-", true).'.'.$display_img_ex_lc;
        $display_img_upload_path = '../newsfeed_uploads/'.$display_new_img_name;
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
        
    $addNewsfeedSql = "INSERT INTO newsfeed (caption,publish_date,publish_time,display_image,created_by) VALUES ('$newsfeed_caption','$new_pub_date','$pub_time','$display_new_img_name','$userId')";

    $addNewsfeedResult = mysqli_query($conn, $addNewsfeedSql);
    $newsfeedId = $conn->insert_id;
    if($addNewsfeedResult){
        $addOrgNewsfeedSql = "INSERT INTO organization_newsfeed (organization_id,newsfeed_id,created_by) VALUES ('$org_list','$newsfeedId','$userId')";
        $addOrgNewsfeedResult = mysqli_query($conn, $addOrgNewsfeedSql);

        if($addOrgNewsfeedResult){
            header("location:../?success=true");
        }else{
            echo (mysqli_error($conn));
        }
    }else{
        echo (mysqli_error($conn));
    }
?>