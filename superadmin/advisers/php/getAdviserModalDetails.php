<?php
require_once "../../../db.php";
?>
<?php
	$user_id = $_POST["id"];
	$user_org_id = $_POST["user_org_id"];
	echo "<script>console.log('user_id: " . $user_id . "' );</script>";

	$sql = "SELECT u.id as u_id, u.first_name as first_name, u.middle_initial as middle_initial, u.last_name as last_name, u.email as user_email, u.contact as user_contact, uo.id as uo_id, uo.date_joined as joined_date, u.date_created as date_created FROM user u INNER JOIN user_type ut ON u.user_type_id = ut.id INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id WHERE u.id = '$user_id' and uo.id = '$user_org_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$u_id = $row['u_id'];
	$uo_id = $row['uo_id'];

	$first_name = $row['first_name'];
	$middle_initial = $row['middle_initial'];
	$last_name = $row['last_name'];
	$user_email = $row['user_email'];
	$user_contact = $row['user_contact'];
	$joined_date = $row['joined_date'];
	$date_created = $row['date_created'];
	
	echo '
        <input type="hidden" id="u_id" name="u_id" class="form-control mb-4" value="'.$u_id.'">
        <input type="hidden" id="uo_id" name="uo_id" class="form-control mb-4" value="'.$uo_id.'">
        <div class="row">
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Name</label>
                <input type="text" id="first_name_for_update" name="first_name_for_update" class="form-control mb-4" value="'.$first_name.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Name</label>
                <input type="text" id="last_name_for_update" name="last_name_for_update" class="form-control mb-4" value="'.$last_name.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Name</label>
                <input type="text" id="middle_initial_for_update" name="middle_initial_for_update" class="form-control mb-4" value="'.$middle_initial.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Organization</label>
                <select class="browser-default custom-select" id="orgList" name="orgList" required>
                </select>
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
                <label class="float-left mb-1 field-label">Date Joined</label>
                <input type="text" id="joined_date_for_update" name="joined_date_for_update" class="form-control mb-4" value="'.$joined_date.'" disabled>
            </div>
            <div class="col-md-6">
                <label class="float-left mb-1 field-label">Date Created</label>
                <input type="date" id="date_created_for_update" name="date_created_for_update" class="form-control datepicker mb-4" value="'.$date_created.'">
            </div>
        </div>
	';
?>