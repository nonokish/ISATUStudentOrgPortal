<?php
	require_once "../../../../../db.php";
	$oa_id = $_POST["id"];

	$sql = "SELECT a.title as ann_title, a.publish_date as ann_pub_date, o.name as org_name, a.content as ann_content, a.display_image as ann_display_img, a.article_image as ann_article_img FROM organization o INNER JOIN organization_announcement oa ON o.id = oa.organization_id INNER JOIN announcement a ON oa.announcement_id = a.id WHERE oa.id = '$oa_id';";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$ann_title = $row['ann_title'];
	$ann_pub_date = $row['ann_pub_date'];
	$org_name = $row['org_name'];
	$ann_content = $row['ann_content'];
	$ann_display_img = $row['ann_display_img'];
	$ann_article_img = $row['ann_article_img'];

	echo "$ann_title,$ann_pub_date,$org_name,$ann_content,$ann_display_img,$ann_article_img";
?>