<?php
if (!isset($_SESSION['user_id'])){
        header('location:../../../../');
    }else{
        $userID = $_SESSION['user_id'];
        $fName = $_SESSION['user_firstName'];
        $mName = $_SESSION['user_middleInitial'];
        $lName = $_SESSION['user_lastName'];
        $email = $_SESSION['user_email'];
        $userType = $_SESSION['user_type'];

        $sql = "SELECT uo.id as user_org_id, o.id as org_id FROM user u INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id WHERE u.id = '$userID'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
            //$_SESSION['user_org_id'] = $row['user_org_id'];
            //$_SESSION['org_id'] = $row['org_id'];
        }
    }
?>