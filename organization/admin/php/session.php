<?php
if (!isset($_SESSION['user_id'])){
        header('location:../../../');
    }else{
        $userID = $_SESSION['user_id'];
        $fName = $_SESSION['user_firstName'];
        $mName = $_SESSION['user_middleName'];
        $lName = $_SESSION['user_lastName'];
        $email = $_SESSION['user_email'];
        $userType = $_SESSION['user_type'];
    }
?>