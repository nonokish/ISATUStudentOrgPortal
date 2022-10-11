<?php
require_once "../../../../db.php";
?>
<?php
	$user_id = $_POST["id"];
	echo "<script>console.log('user_id: " . $user_id . "' );</script>";

	$sql = "SELECT u.id as u_id, u.first_name as first_name, u.middle_initial as middle_initial, u.last_name as last_name, u.department as user_department, u.course_year as course_year, u.email as user_email, u.contact as user_contact, u.designation as user_designation, uo.id as uo_id, uo.date_joined as joined_date, u.user_type_id as user_type_id FROM user u INNER JOIN user_type ut ON u.user_type_id = ut.id INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id WHERE u.id = '$user_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$u_id = $row['u_id'];
	$first_name = $row['first_name'];
	$middle_initial = $row['middle_initial'];
	$last_name = $row['last_name'];
	$user_department = $row['user_department'];
	$course_year = $row['course_year'];
	$user_email = $row['user_email'];
	$user_contact = $row['user_contact'];
	$user_type_id = $row['user_type_id'];
    if($user_type_id == 4){
        $user_designation = "Adviser";
    } else if($user_type_id != 4 && empty($row['user_designation'])){
        $user_designation = "Member";
    } else {
        $user_designation = $row['user_designation'];
    }
	$uo_id = $row['uo_id'];
	$joined_date = $row['joined_date'];
	
	echo '
        <div class="row">
            <input type="hidden" id="member_id_for_update" name="member_id_for_update" class="form-control mb-4" value="'.$u_id.'">
            <input type="hidden" id="uo_id_for_update" name="uo_id_for_update" class="form-control mb-4" value="'.$uo_id.'">
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">First Name</label>
                <input type="text" id="first_name_for_update" name="first_name_for_update" class="form-control mb-4" value="'.$first_name.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Last Name</label>
                <input type="text" id="last_name_for_update" name="last_name_for_update" class="form-control mb-4" value="'.$last_name.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Middle Initial</label>
                <input type="text" id="middle_initial_for_update" name="middle_initial_for_update" class="form-control mb-4" value="'.$middle_initial.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Department</label>
                <input type="text" id="dept_for_update" name="dept_for_update" class="form-control mb-4" value="'.$user_department.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Course & Year</label>
                <input type="text" id="cy_for_update" name="cy_for_update" class="form-control mb-4" value="'.$course_year.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Email</label>
                <input type="text" id="email_for_update" name="email_for_update" class="form-control mb-4" value="'.$user_email.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Phone Number</label>
                <input type="text" id="contact_for_update" name="contact_for_update" class="form-control mb-4" value="'.$user_contact.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Designation</label>
                <input type="text" id="desg_for_update" name="desg_for_update" class="form-control mb-4" value="'.$user_designation.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Date Joined</label>
                <input type="date" id="jd_for_update" name="jd_for_update" class="form-control datepicker mb-4" value="'.$joined_date.'">
            </div>
        </div>
        <div class="mx-auto text-center mt-2">
          <a class="delete-btn">Delete Member</a>
        </div>
	';
?>