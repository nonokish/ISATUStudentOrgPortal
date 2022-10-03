<?php
require_once "../../../db.php";
?>
<?php
	$org_id = $_POST["id"];
	echo "<script>console.log('org_id : " . $org_id . "' );</script>";

	$sql = "SELECT o.id as org_id, o.name as org_name, oc.id as org_class_id, oc.name as org_class_name, CONCAT(u.first_name, ' ', u.middle_initial, ' ', u.last_name) as adviser_name, uo.date_joined as date_joined, o.org_date_created as org_date_created FROM organization o INNER JOIN organization_classification oc ON o.org_classification_id = oc.id INNER JOIN user_organization uo ON o.id = uo.organization_id INNER JOIN user u ON uo.user_id = u.id WHERE u.user_type_id = 4 and o.id = '$org_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$org_name = $row['org_name'];
	$org_class_name = $row['org_class_name'];
	$adviser_name = $row['adviser_name'];
	$date_joined = $row['date_joined'];
	$org_date_created = $row['org_date_created'];
	
	echo '
        <div class="row">
            <div class="col-md-12 px-2">
                <label class="float-left mb-1 field-label">Organization</label>
                <input type="text" id="" class="form-control mb-4" value="'.$org_name.'">
            </div>
            <div class="col-md-6 px-2">
            <label class="float-left mb-1 field-label">Classification</label>
                <select class="browser-default custom-select" id="orgClassification" name="orgClassification" required>
                </select>
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Adviser</label>
                <input type="text" id="" class="form-control mb-4" value="'.$adviser_name.'">
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Date Joined</label>
                <input type="text" id="" class="form-control mb-4" value="'.$date_joined.'" disabled>
            </div>
            <div class="col-md-6 px-2">
                <label class="float-left mb-1 field-label">Date Created</label>
                <input type="date" id="" class="form-control datepicker mb-4" value="'.$org_date_created.'">
            </div>
        </div>
	';
?>