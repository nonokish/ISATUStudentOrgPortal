<?php
require_once '../../../db.php';
?>
<?php  
	$org_id = $_GET["id"];
	echo "<script>console.log('org_id: " . $org_id . "' );</script>";
    echo'
        <table class="table table-bordered table-responsive-md table-striped text-center">
      		<thead>
      			<tr>
                    <th scope="col">Date Joined</th>
                    <th scope="col">Name</th>
                    <th scope="col">Course & Year</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Position</th> 
      				</tr>
      			</thead>
      		<tbody id="dbMembersTable">
    ';
    
    $memberDetailsSql = "SELECT u.id as user_id, uo.date_joined as date_joined, CONCAT(u.first_name, ' ', u.middle_initial, ' ', u.last_name) as member_name, u.course_year as course_year, o.name as org_name, u.email as member_email, u.contact as member_contact, u.designation as user_designation, u.user_type_id as user_type_id FROM user u INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id LEFT JOIN user_type ut ON u.user_type_id = ut.id WHERE uo.organization_id = '$org_id'";
    $memberDetailsResult = mysqli_query($conn, $memberDetailsSql);
    
    if(mysqli_num_rows($memberDetailsResult) > 0){
        while($row = mysqli_fetch_assoc($memberDetailsResult)){
            $date_joined = $row['date_joined'];
            $user_id = $row['user_id'];
            $member_name = $row['member_name'];
            $course_year = $row['course_year'];
            $member_email = $row['member_email'];
            $member_contact = $row['member_contact'];
            $user_type_id = $row['user_type_id'];
            if($user_type_id == 4){
                $user_designation = "Adviser";
            } else if($user_type_id != 4 && empty($row['user_designation'])){
                $user_designation = "Member";
            } else {
                $user_designation = $row['user_designation'];
            }
            echo '
                <tr>
                    <td>'.$date_joined.'</td>
                    <td>'.$member_name.'</td>
                    <td>'.$course_year.'</td>
                    <td>'.$member_email.'</td>
                    <td>'.$member_contact.'</td>
                    <td>'.$user_designation.'</td>
                </tr>
            ';
        }

        echo '
            </tbody>
        </table>
        ';
    }
?>