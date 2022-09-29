<?php
require_once '../../../db.php';
?>
<?php  
    $organization_id = $_SESSION['org_id'];
    echo "<script>console.log('organization_id: " . $organization_id . "' );</script>";

    echo'
        <table id="organizationMemberTable" class="table table-hover dashboard-table">
      		<thead>
      			<tr>
      			    <th scope="col">Date Joined</th>
      				<th scope="col">Name</th>
      				<th scope="col">Course & Year</th>
      				<th scope="col">Email</th>
      				<th scope="col">Phone Number</th>    
      				</tr>
      			</thead>
      		<tbody id="dbMembersTable">
    ';
    $sql = "SELECT uo.date_joined as user_date_joined, CONCAT(u.first_name, ' ', u.middle_initial, ' ', u.last_name) as student_name, u.course_year as course_year, u.email as user_email, u.contact as user_contact FROM organization o INNER JOIN user_organization uo ON o.id = uo.organization_id INNER JOIN user u ON uo.user_id = u.id WHERE o.id = '$organization_id'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $user_date_joined = $row['user_date_joined'];
            $student_name = $row['student_name'];
            $course_year = $row['course_year'];
            $user_email = $row['user_email'];
            $user_contact = $row['user_contact'];
            echo '
                <tr>
                    <td>'.$user_date_joined.'</td>
                    <td>'.$student_name.'</td>
                    <td>'.$course_year.'</td>
                    <td>'.$user_email.'</td>
                    <td>'.$user_contact.'</td>
                </tr>
            ';
        }

        echo '
            </tbody>
        </table>
        ';
    }
?>