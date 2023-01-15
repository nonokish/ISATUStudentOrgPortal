<?php
require_once '../../../../db.php';
?>
<?php  
    echo'
        <table class="table">
      		<thead>
      			<tr>
                    <th scope="col">Title</th>
                    <th scope="col">Publish Date</th>
                    <th scope="col">Organization</th>
                    <th scope="col">Action</th>
      				</tr>
      			</thead>
      		<tbody id="dbOrgsTable">
    ';
    
    $orgDetailsSql = "SELECT oa.id as oa_id, a.title as ann_title, a.publish_date as ann_pub_date, o.id as org_id, o.name as org_name FROM organization o INNER JOIN organization_announcement oa ON o.id = oa.organization_id INNER JOIN announcement a ON oa.announcement_id = a.id WHERE oa.is_active = 1";
    $orgDetailsResult = mysqli_query($conn, $orgDetailsSql);
    
    if(mysqli_num_rows($orgDetailsResult) > 0){
        while($row = mysqli_fetch_assoc($orgDetailsResult)){
            $oa_id = $row['oa_id'];
            $org_id = $row['org_id'];
            $ann_title = $row['ann_title'];
            $ann_pub_date = $row['ann_pub_date'];
            $org_name = $row['org_name'];
            echo '
                <tr>
                    <td>'.$ann_title.'</td>
                    <td>'.$ann_pub_date.'</td>
                    <td>'.$org_name.'</td>
                    <td><a class="see-contents-link py-1 px-3" onclick="getAnnouncementHistoryModal('.$oa_id.')" data-toggle="modal" data-target="#announcementDetailsModal">See Details</a></td>
                </tr>
            ';
        }

        echo '
            </tbody>
        </table>
        ';
    }
?>