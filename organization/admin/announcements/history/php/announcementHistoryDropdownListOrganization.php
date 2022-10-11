<?php
    require_once '../../../../../db.php';

    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];

    $sql = "SELECT o.id as org_id, o.name as org_name FROM user u INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id WHERE uo.user_id = '$user_id'";
    
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo'<option selected disabled value="">Select Organization</option>';
        while($row = mysqli_fetch_assoc($result)){
            $org_id = $row['org_id'];
            $org_name = $row['org_name'];

            echo'
            <option value="'.$org_id.'">'.$org_name.'</option>
            ';
        }
    }
?>