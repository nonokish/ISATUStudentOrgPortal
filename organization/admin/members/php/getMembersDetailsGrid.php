<?php
require_once '../../../../db.php';
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
    
    $org_id = $_SESSION['org_id'];
    $org_array = $_SESSION['org_array'];
    $user_org_array = $_SESSION['user_org_array'];
    echo "<script>console.log('org_array: " . $org_array . "' );</script>";
    echo "<script>console.log('user_org_array: " . $user_org_array . "' );</script>";
    $memberDetailsSql = "SELECT uo.date_joined as date_joined, CONCAT(u.first_name, ' ', u.middle_initial, ' ', u.last_name) as member_name, o.name as org_name, u.email as member_email, u.contact as member_contact FROM user u INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id WHERE uo.organization_id IN ($org_array)";
    $memberDetailsResult = mysqli_query($conn, $memberDetailsSql);
    
    if(mysqli_num_rows($memberDetailsResult) > 0){
        while($row = mysqli_fetch_assoc($memberDetailsResult)){
            $date_joined = $row['date_joined'];
            $member_name = $row['member_name'];
            $org_name = $row['org_name'];
            $member_email = $row['member_email'];
            $member_contact = $row['member_contact'];
            echo '
                <tr>
                    <td>'.$date_joined.'</td>
                    <td>'.$member_name.'</td>
                    <td>'.$org_name.'</td>
                    <td>'.$member_email.'</td>
                    <td>'.$member_contact.'</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#adviserDetailsModal">See Details</a>
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