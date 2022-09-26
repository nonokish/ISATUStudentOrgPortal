<?php
require_once './db.php';

$email = mysqli_real_escape_string($conn, trim($_POST['loginEmail']));
$password = mysqli_real_escape_string($conn, trim($_POST['loginPassword']));
//$password = mysqli_real_escape_string($conn, md5(trim($_POST['loginPassword'])));

$sql = "SELECT * FROM user WHERE email = '$email' AND password = PASSWORD('$password')";
$result = mysqli_query($conn,$sql);

$user_data = mysqli_fetch_array($result);

if(is_null($user_data)) {

    //header("location:./organization/admin?success=false");
    header("location:./");
}
else
{
    $_SESSION['user_id'] = $user_data['id'];
    $_SESSION['user_firstName'] = $user_data['first_name'];
    $_SESSION['user_middleName'] = $user_data['middle_name'];
    $_SESSION['user_lastName'] = $user_data['last_name'];
    $_SESSION['user_email'] = $user_data['email'];
    $_SESSION['user_type'] = $user_data['user_type_id'];

    if($user_data['user_type_id'] == 5){
        header("location:./superadmin?success=true");
    }else{
        header("location:./organization/admin?success=true");
    }
}

?>