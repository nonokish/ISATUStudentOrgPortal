<?php
require_once '../../../db.php';
?>
<?php
    $organization_id = $_GET['oid'];
	echo "<script>console.log('organization_id: " . $organization_id . "' );</script>";
    $newsfeedSql = "SELECT n.id as n_id, n.display_image as display_image, n.publish_date as publish_date, o.name as org_name, n.caption as n_caption FROM newsfeed n INNER JOIN organization_newsfeed onf ON n.id = onf.newsfeed_id INNER JOIN organization o ON onf.organization_id = o.id WHERE o.id = '$organization_id'";
    $newsfeedResult = mysqli_query($conn, $newsfeedSql);
    
    if(mysqli_num_rows($newsfeedResult) > 0){
        while($row = mysqli_fetch_assoc($newsfeedResult)){
            $n_id = $row['n_id'];
            $display_image = $row['display_image'];
            $publish_date = $row['publish_date'];
            $org_name = $row['org_name'];
            $n_caption = $row['n_caption'];
            echo '
                <div class="col-md-12">
                    <div class="card nf-post-card py-5 px-5">
                        <div class="nf-post-body mb-4">
                            <div class="nf-post-org-name">'.$org_name.'</div>
                            <div class="nf-post-date-author mb-2">Posted 3 mins ago</div>
                            <div class="nf-post-caption">
                            '.$n_caption.'
                            </div>
                        </div>
                        <img src="../../organization/admin/newsfeed/newsfeed_uploads/'.$display_image.'" class="nf-post-img" alt="Post Image"/>
                    </div>
                </div>
            ';
        }
    }
?>