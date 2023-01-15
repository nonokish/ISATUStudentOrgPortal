<?php
    require_once '../../../../../db.php';
    $user_id = $_SESSION['user_id'];
    
    $org_ann_id = mysqli_real_escape_string($conn, trim($_POST['org_ann_id']));

    $sql = "UPDATE organization_announcement SET is_active = 0 WHERE id = '$org_ann_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:../?success=true");
    } else{
        echo (mysqli_error($conn));
    }
?>