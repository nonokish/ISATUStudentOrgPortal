<?php
    require_once '../../../../db.php';

    $sql = "SELECT ot.id as org_classification_id, ot.name as org_classification FROM organization_classification ot";
    
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo'<option selected disabled value="">Select Classification</option>';
        while($row = mysqli_fetch_assoc($result)){
            $org_classification_id = $row['org_classification_id'];
            $org_classification = $row['org_classification'];

            echo'
            <option value="'.$org_classification_id.'">'.$org_classification.'</option>
            ';
        }
    }
?>