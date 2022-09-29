<?php
if (!isset($_SESSION['user_id'])){
        header("location:../../");
    }else{
        $userID = $_SESSION['user_id'];
        $fName = $_SESSION['user_firstName'];
        $mName = $_SESSION['user_middleInitial'];
        $lName = $_SESSION['user_lastName'];
        $email = $_SESSION['user_email'];
        $userType = $_SESSION['user_type'];
        //$org_array = array();
        //$user_org_array = array();

        
        if(isset($_SESSION['switch_org_id'])){
            $org_id = $_SESSION['switch_org_id'];
            echo "<script>console.log('org_id new session: " . $org_id . "');</script>";
            $sql = "SELECT uo.id as user_org_id, o.id as org_id FROM user u INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id WHERE u.id = '$userID' AND o.id = '$org_id'";
        } else {
            echo "<script>console.log('org_id not new session:');</script>";
            $sql = "SELECT uo.id as user_org_id, o.id as org_id FROM user u INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id WHERE u.id = '$userID' LIMIT 1";
        }

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            //$_SESSION['user_org_id'] = $row['user_org_id'];
            $_SESSION['org_id'] = $row['org_id'];
        }

        /*if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($org_array,$row['org_id']);
                array_push($user_org_array,$row['user_org_id']);
                //$_SESSION['org_id_array'] = $org_array;
                //$org_id_array_explode = explode(", ",$row['org_id']);
            }
            $org_id_array_implode = implode(',', $org_array);
            $user_org_id_array_implode = implode(',', $user_org_array);
            $_SESSION['org_array'] = $org_id_array_implode;
            $_SESSION['user_org_array'] = $user_org_id_array_implode;
            echo "<script>console.log('org_id_array_implode: " . $org_id_array_implode . "' );</script>";
            echo "<script>console.log('org_id_array_implode: " . $user_org_id_array_implode . "' );</script>";
        }*/
    }
?>