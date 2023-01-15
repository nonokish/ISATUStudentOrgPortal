<?php
require_once "../../../../db.php";
?>
<?php
	$user_id = $_POST["id"];
	echo "<script>console.log('user_id: " . $user_id . "' );</script>";

	$sql = "SELECT u.id as u_id, CONCAT(u.first_name, ' ', u.middle_initial, ' ', u.last_name) as member_name, u.department as user_department, u.course_year as course_year, u.email as user_email, u.contact as user_contact, u.designation as user_designation, uo.date_joined as joined_date, u.user_type_id as user_type_id FROM user u INNER JOIN user_type ut ON u.user_type_id = ut.id INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id WHERE u.id = '$user_id' AND uo.is_active = 1";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$member_name = $row['member_name'];
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
	$joined_date = $row['joined_date'];
	
	echo '
        <div class="row">
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Name</label>
                <input type="text" id="" class="form-control mb-4" value="'.$member_name.'" disabled>
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Department</label>
                <input type="text" id="" class="form-control mb-4" value="'.$user_department.'" disabled>
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Course & Year</label>
                <input type="text" id="" class="form-control mb-4" value="'.$course_year.'" disabled>
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Email</label>
                <input type="text" id="" class="form-control mb-4" value="'.$user_email.'" disabled>
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Phone Number</label>
                <input type="text" id="" class="form-control mb-4" value="'.$user_contact.'" disabled>
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Designation</label>
                <input type="text" id="" class="form-control mb-4" value="'.$user_designation.'" disabled>
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Date Joined</label>
                <input type="date" id="" class="form-control datepicker mb-4" value="'.$joined_date.'" disabled>
            </div>
        </div>
	';
?>