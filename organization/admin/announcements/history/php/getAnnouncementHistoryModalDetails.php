<?php
require_once "../../../../../db.php";
?>
<?php
	$oa_id = $_POST["id"];
	echo "<script>console.log('oa_id: " . $oa_id . "' );</script>";

	$sql = "SELECT a.title as ann_title, a.publish_date as ann_pub_date, o.name as org_name, a.content as ann_content, a.display_image as ann_display_img FROM organization o INNER JOIN organization_announcement oa ON o.id = oa.organization_id INNER JOIN announcement a ON oa.announcement_id = a.id WHERE oa.id = '$oa_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$ann_title = $row['ann_title'];
	$ann_pub_date = $row['ann_pub_date'];
	$org_name = $row['org_name'];
	$ann_content = $row['ann_content'];
	$ann_display_img = $row['ann_display_img'];
	
	echo '
		<label class="float-left mb-1 field-label">Announcement Title</label>
		<input type="text" id="ann_title_detail" class="form-control mb-4" value="'.$ann_title.'" disabled>

		<label class="float-left mb-1 field-label">Publish Date</label>
		<input type="text" id="ann_pub_date_detail" class="form-control mb-4" value="'.$ann_pub_date.'" disabled>

		<label class="float-left mb-1 field-label">Organization</label>
		<input type="text" id="ann_org_detail" class="form-control mb-4" value="'.$org_name.'" disabled>

		<div class="form-group mb-4">
		<label class="float-left mb-1 field-label">Content</label>
		<textarea class="form-control rounded-0" id="ann_content_detail" rows="3" value="" disabled>'.$ann_content.'</textarea>
		</div>

		<div class="form-group mb-3">
		<label class="field-label mb-4">Images</label>
		<div class="announcement-images-container">
			<div class="mb-2">
			<label class="field-sub-label">Display Image</label>
			</div>
			<div class="announcement-images mb-4">
			<img src="../../announcements/announcement_uploads/'.$ann_display_img.'" alt="thumbnail" id="ann_display_img_detail" class="img-thumbnail mb-1" style="width: 150px">
			</div>

			<!--<div class="mb-2">
			<label class="field-sub-label">Article Images</label>
			</div>
			<div class="announcement-images">
			<img src="" alt="thumbnail" id="ann_article_img_detail" class="img-thumbnail mb-1" style="width: 150px">
			</div>-->
			
			
		</div>
			<div class="mx-auto text-center mt-5">
              <a class="delete-btn" data-toggle="modal" data-target="#deleteAlert" data-dismiss="modal">Delete Announcement</a>
            </div>
		</div>
	';
?>