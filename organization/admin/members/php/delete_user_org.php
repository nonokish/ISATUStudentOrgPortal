<?php
    require_once '../../../../db.php';
    $user_id = $_SESSION['user_id'];
    
    $user_org_id = mysqli_real_escape_string($conn, trim($_POST['user_org_id']));

    $sql = "UPDATE user_organization SET is_active = 0 WHERE id = '$user_org_id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:../?success=true");
    } else{
        echo (mysqli_error($conn));
    }
?>