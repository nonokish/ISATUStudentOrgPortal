<?php
require_once '../../db.php';
?>
<?php  
    echo'
        <table class="table table-hover dashboard-table">
      		<thead>
      			<tr>
                    <th scope="col">Date Joined</th>
                    <th scope="col">Name</th>
                    <th scope="col">Adviser</th>
                    <th scope="col">Date Created</th>
      				</tr>
      			</thead>
      		<tbody id="dbOrgsTable">
    ';
    $orgDetailsSql = "SELECT o.id as org_id, o.name as org_name, oc.name as org_classification, CONCAT(u.first_name, ' ', u.middle_initial, ' ', u.last_name) as adviser_name, uo.date_joined as date_joined, o.org_date_created as org_date_created FROM organization o INNER JOIN organization_classification oc ON o.org_classification_id = oc.id INNER JOIN user_organization uo ON o.id = uo.organization_id INNER JOIN user u ON uo.user_id = u.id WHERE u.user_type_id = 4 AND uo.is_active = 1";
    $orgDetailsResult = mysqli_query($conn, $orgDetailsSql);
    
    if(mysqli_num_rows($orgDetailsResult) > 0){
        while($row = mysqli_fetch_assoc($orgDetailsResult)){
            $org_id = $row['org_id'];
            $date_joined = $row['date_joined'];
            $org_name = $row['org_name'];
            $adviser_name = $row['adviser_name'];
            $org_date_created = $row['org_date_created'];
            echo '
                <tr>
                    <td>'.$date_joined.'</td>
                    <td>'.$org_name.'</td>
                    <td>'.$adviser_name.'</td>
                    <td>'.$org_date_created.'</td>
                </tr>
            ';
        }

        echo '
            </tbody>
        </table>
        ';
    }
?>