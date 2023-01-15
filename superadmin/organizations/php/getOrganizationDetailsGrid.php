<?php
require_once '../../../db.php';
?>
<?php  
    echo'
        <table id="organizationMemberTable" class="table table-hover dashboard-table">
      		<thead>
      			<tr>
                    <th scope="col">Name</th>
                    <th scope="col">Classification</th>
                    <th scope="col">Adviser</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Action</th>
      				</tr>
      			</thead>
      		<tbody id="dbMembersTable">
    ';
    $orgDetailsSql = "SELECT o.id as org_id, o.name as org_name, oc.name as org_classification, CONCAT(u.first_name, ' ', u.middle_initial, ' ', u.last_name) as adviser_name, o.org_date_created as org_date_created FROM organization o INNER JOIN organization_classification oc ON o.org_classification_id = oc.id INNER JOIN user_organization uo ON o.id = uo.organization_id INNER JOIN user u ON uo.user_id = u.id WHERE u.user_type_id = 4 AND uo.is_active = 1";
    $orgDetailsResult = mysqli_query($conn, $orgDetailsSql);
    
    if(mysqli_num_rows($orgDetailsResult) > 0){
        while($row = mysqli_fetch_assoc($orgDetailsResult)){
            $org_id = $row['org_id'];
            $org_name = $row['org_name'];
            $org_classification = $row['org_classification'];
            $adviser_name = $row['adviser_name'];
            $org_date_created = $row['org_date_created'];
            echo '
                <tr>
                    <td>'.$org_name.'</td>
                    <td>'.$org_classification.'</td>
                    <td>'.$adviser_name.'</td>
                    <td>'.$org_date_created.'</td>
                    <td>
                    <a class="see-contents-link py-1 px-3" onclick="getOrganizationDetailsModal('.$org_id.')" data-toggle="modal" data-target="#orgsDetailsModal">See Details</a>
                    <a class="see-contents-link py-1 px-3" onclick="getOrganizationMembersModal('.$org_id.')" data-toggle="modal" data-target="#orgsMembersModal">See Members</a>
                    </td>
                </tr>
            ';
        }

        echo '
            </tbody>
        </table>
        ';
    }
?>