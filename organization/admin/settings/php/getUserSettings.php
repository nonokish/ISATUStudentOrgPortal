<?php
require_once "../../../../db.php";
?>
<?php
    $user_id = $_SESSION['user_id'];
    $org_id = $_SESSION['org_id'];
	echo "<script>console.log('user_id: " . $user_id . "' );</script>";
	echo "<script>console.log('org_id: " . $org_id . "' );</script>";

	$sql = "SELECT u.id as u_id, o.id as o_id, o.name as o_name, oc.name as o_class, CONCAT(u.first_name, ' ', u.middle_initial, '. ', u.last_name) as adv_name, uo.date_joined as joined_date, o.org_date_created as o_date_created FROM organization o INNER JOIN organization_classification oc ON o.org_classification_id = oc.id INNER JOIN user_organization uo ON o.id = uo.organization_id INNER JOIN user u ON uo.user_id = u.id INNER JOIN user_type ut ON u.user_type_id = ut.id WHERE u.id = '$user_id' and o.id = '$org_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

    $adviserSql = "SELECT uo.organization_id as org_id, CONCAT(u.first_name, ' ', u.middle_initial, '. ', u.last_name) as adv_name FROM user u INNER JOIN user_organization uo ON u.id = uo.user_id WHERE u.user_type_id = 4 AND uo.organization_id = '$org_id'";
	$adviserResult = mysqli_query($conn, $adviserSql);
	$adviserRow = mysqli_fetch_assoc($adviserResult);

	$u_id = $row['u_id'];
	$o_id = $row['o_id'];

	$o_name = $row['o_name'];
	$o_class = $row['o_class'];
	$adv_name = $adviserRow['adv_name'];
	$joined_date = $row['joined_date'];
	$o_date_created = $row['o_date_created'];
	
	echo '
        <input type="hidden" id="u_id" name="u_id" class="form-control mb-4" value="'.$u_id.'">
        <input type="hidden" id="o_id" name="o_id" class="form-control mb-4" value="'.$o_id.'">
        <div class="col-md-12 px-2">
            <label class="float-left mb-1 field-label">Organization</label>
            <input type="text" id="orgName" name="orgName" class="form-control mb-4" value="'.$o_name.'">
        </div>
        <div class="col-md-6 px-2">
            <label class="float-left mb-1 field-label">Classification</label>
            <select class="browser-default custom-select" id="orgClassification" name="orgClassification" required>
            </select>
        </div>
        <div class="col-md-6 px-2">
            <label class="float-left mb-1 field-label">Adviser</label>
            <input type="text" id="orgAdviser" name="orgAdviser" class="form-control mb-4" value="'.$adv_name.'" disabled>
        </div>
        <div class="col-md-6 px-2">
            <label class="float-left mb-1 field-label">Date Joined</label>
            <input type="text" id="orgDateJoined" name="orgDateJoined" class="form-control mb-4" value="'.$joined_date.'" disabled>
        </div>
        <div class="col-md-6 px-2">
            <label class="float-left mb-1 field-label">Date Created</label>
            <input type="date" id="orgDateCreated" name="orgDateCreated" class="form-control datepicker mb-4" value="'.$o_date_created.'">
        </div>
	';
?>