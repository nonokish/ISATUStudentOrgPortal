<?php
require_once '../../../../db.php';
?>
<?php  
    echo'
        <table class="table">
      		<thead>
      			<tr>
                    <th scope="col">Publish Date</th>
                    <th scope="col">Caption</th>
                    <th scope="col">Organization</th>
                    <th scope="col">Action</th>
      			</tr>
      		</thead>
      		<tbody id="dbOrgsTable">
    ';

    $orgDetailsSql = "SELECT onf.id as onf_id, n.caption as newsfeed_caption, n.publish_date as newsfeed_pub_date, o.id as org_id, o.name as org_name FROM organization o INNER JOIN organization_newsfeed onf ON o.id = onf.organization_id INNER JOIN newsfeed n ON onf.newsfeed_id = n.id";
    $orgDetailsResult = mysqli_query($conn, $orgDetailsSql);
    
    if(mysqli_num_rows($orgDetailsResult) > 0){
        while($row = mysqli_fetch_assoc($orgDetailsResult)){
            $onf_id = $row['onf_id'];
            $org_id = $row['org_id'];
            $newsfeed_caption = $row['newsfeed_caption'];
            $newsfeed_pub_date = $row['newsfeed_pub_date'];
            $org_name = $row['org_name'];
            echo '
                <tr>
                    <td>'.$newsfeed_pub_date.'</td>
                    <td>'.$newsfeed_caption.'</td>
                    <td>'.$org_name.'</td>
                    <td><a class="see-contents-link py-1 px-3" onclick="getNewsfeedHistoryModal('.$onf_id.')" data-toggle="modal" data-target="#postsDetailsModal">See Details</a></td>
                </tr>
            ';
        }

        echo '
            </tbody>
        </table>
        ';
    }
?>