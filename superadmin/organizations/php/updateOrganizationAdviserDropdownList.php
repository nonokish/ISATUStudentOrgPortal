<?php
    require_once '../../../db.php';

    $sql = "SELECT u.id as u_id, CONCAT(u.first_name, ' ', u.middle_initial, '. ', u.last_name) as adviser_name FROM user u WHERE u.user_type_id = 4";
    
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo'<option selected disabled value="">Select Adviser</option>';
        while($row = mysqli_fetch_assoc($result)){
            $u_id = $row['u_id'];
            $adviser_name = $row['adviser_name'];

            echo'
            <option value="'.$u_id.'">'.$adviser_name.'</option>
            ';
        }
    }
?>