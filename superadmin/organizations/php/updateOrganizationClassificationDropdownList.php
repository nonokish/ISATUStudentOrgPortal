<?php
    require_once '../../../db.php';

    $sql = "SELECT oc.id as oc_id, oc.name as org_class FROM organization_classification oc";
    
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo'<option selected disabled>Select Classification</option>';
        while($row = mysqli_fetch_assoc($result)){
            $oc_id = $row['oc_id'];
            $org_class = $row['org_class'];

            echo'
            <option value="'.$oc_id.'">'.$org_class.'</option>
            ';
        }
    }
?>