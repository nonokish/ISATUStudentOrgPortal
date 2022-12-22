<?php
require_once "../../../../db.php";
?>
<?php
	$onf_id = $_POST["id"];

	$sql = "SELECT n.caption as newsfeed_caption, n.publish_date as newsfeed_pub_date, o.name as org_name, n.display_image as newsfeed_display_img FROM organization o INNER JOIN organization_newsfeed onf ON o.id = onf.organization_id INNER JOIN newsfeed n ON onf.newsfeed_id = n.id WHERE onf.id = '$onf_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$newsfeed_caption = $row['newsfeed_caption'];
	$newsfeed_pub_date = $row['newsfeed_pub_date'];
	$org_name = $row['org_name'];
	$newsfeed_display_img = $row['newsfeed_display_img'];
	
	echo '
		<label class="float-left mb-1 field-label">Publish Date</label>
        <input type="text" id="newsfeed_pub_date_detail" class="form-control mb-4" value="'.$newsfeed_pub_date.'" disabled>

        <label class="float-left mb-1 field-label">Organization</label>
        <input type="text" id="newsfeed_org_detail" class="form-control mb-4" value="'.$org_name.'" disabled>

        <div class="form-group mb-4">
            <label class="float-left mb-1 field-label">Caption</label>
            <textarea class="form-control rounded-0" id="ann_content_detail" rows="3" value="" disabled>'.$newsfeed_caption.'</textarea>
        </div>

        <div class="form-group mb-3">
            <label class="field-label mb-4">Images</label>
            <div class="announcement-images-container">
            <div class="mb-2">
                <label class="field-sub-label">Display Image</label>
            </div>
            <div class="announcement-images mb-4">
                <img src="../../../organization/admin/newsfeed/newsfeed_uploads/'.$newsfeed_display_img.'" alt="thumbnail" id="" class="img-thumbnail mb-1" style="width: 150px">
            </div>

            <!--<div class="mb-2">
                <label class="field-sub-label">Article Images</label>
            </div>
            <div class="announcement-images">
                <img src="" alt="thumbnail" id="" class="img-thumbnail mb-1" style="width: 150px">
            </div>-->
              
            </div>
        </div>
	';
?>