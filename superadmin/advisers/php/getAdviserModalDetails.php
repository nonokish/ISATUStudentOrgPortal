<?php
require_once "../../../db.php";
?>
<?php
	$user_id = $_POST["id"];
	echo "<script>console.log('user_id: " . $user_id . "' );</script>";

	$sql = "SELECT u.id as u_id, CONCAT(u.first_name, ' ', u.middle_initial, ' ', u.last_name) as adviser_name, u.email as user_email, u.contact as user_contact, uo.date_joined as joined_date, u.date_created as date_created FROM user u INNER JOIN user_type ut ON u.user_type_id = ut.id INNER JOIN user_organization uo ON u.id = uo.user_id INNER JOIN organization o ON uo.organization_id = o.id WHERE u.id = '$user_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$adviser_name = $row['adviser_name'];
	$user_email = $row['user_email'];
	$user_contact = $row['user_contact'];
	$joined_date = $row['joined_date'];
	$date_created = $row['date_created'];
	
	echo '
        <div class="row">
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Name</label>
                <input type="text" id="" class="form-control mb-4" value="'.$adviser_name.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Organization</label>
                <select class="browser-default custom-select" id="orgList" name="orgList" required>
                </select>
            </div>
                <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Email</label>
                <input type="text" id="" class="form-control mb-4" value="'.$user_email.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Phone Number</label>
                <input type="text" id="" class="form-control mb-4" value="'.$user_contact.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Date Joined</label>
                <input type="text" id="" class="form-control mb-4" value="'.$joined_date.'">
            </div>
            <div class="col-md-6">
                <label class="float-left mb-1 field-label">Date Created</label>
                <input type="date" id="" class="form-control datepicker mb-4" value="'.$date_created.'">
            </div>
        </div>
	';
?>