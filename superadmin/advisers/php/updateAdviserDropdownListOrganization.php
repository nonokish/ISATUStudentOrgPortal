<?php
    require_once '../../../db.php';

    $sql = "SELECT o.id as org_id, o.name as org_name FROM organization o";
    
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