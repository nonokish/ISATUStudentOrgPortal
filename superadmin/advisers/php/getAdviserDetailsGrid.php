<?php
require_once '../../../db.php';
?>
<?php  
    echo'
        <table class="table">
      		<thead>
      			<tr>
                    <th scope="col">Date Joined</th>
                    <th scope="col">Name</th>
                    <th scope="col">Organization</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
      				</tr>
      			</thead>
      		<tbody id="dbAdvisersTable">
    ';
    $orgDetailsSql = "SELECT u.id as user_id, uo.date_joined as date_joined, CONCAT(u.first_name, ' ', u.middle_initial, ' ', u.last_name) as adviser_name, o.name as org_name, u.email as adv_email, u.contact as adv_contact FROM user u LEFT JOIN user_organization uo ON u.id = uo.user_id LEFT JOIN organization o ON uo.organization_id = o.id WHERE u.user_type_id = 4";
    $orgDetailsResult = mysqli_query($conn, $orgDetailsSql);
    
    if(mysqli_num_rows($orgDetailsResult) > 0){
        while($row = mysqli_fetch_assoc($orgDetailsResult)){
            $user_id = $row['user_id'];
            $date_joined = $row['date_joined'];
            $adviser_name = $row['adviser_name'];
            $org_name = $row['org_name'];
            $adv_email = $row['adv_email'];
            $adv_contact = $row['adv_contact'];
            echo '
                <tr>
                    <td>'.$date_joined.'</td>
                    <td>'.$adviser_name.'</td>
                    <td>'.$org_name.'</td>
                    <td>'.$adv_email.'</td>
                    <td>'.$adv_contact.'</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" onclick="getAdviserDetailsModal('.$user_id.')" data-toggle="modal" data-target="#adviserDetailsModal">See Details</a>
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