<?php
require_once '../../../db.php';
?>
<?php
    $organization_id = $_GET['oid'];

    $filter_input = $_GET['filter_input'];
    $filter = $_GET['filter'];
    $where_clause_input_filter = "LOWER(a.content) LIKE '%%'";

    if($filter == "all") {
        $where_clause = "1=1";
    } else if($filter == "today") {
        $where_clause = "a.publish_date = CURDATE()";
    } else if($filter == "this_week") {
        $where_clause = "YEARWEEK(a.publish_date) = YEARWEEK(NOW())";
    } else if($filter == "this_month") {
        $where_clause = "(YEAR(a.publish_date) = YEAR(CURDATE()) AND MONTH(a.publish_date) = MONTH(CURDATE()))";
    } else if($filter == "this_year") {
        $where_clause = "YEAR(a.publish_date) = YEAR(CURDATE())";
    }

    if($filter_input == "") {
        $where_clause_input_filter = "LOWER(a.content) LIKE '%%'";
    } else {
        $where_clause_input_filter = "LOWER(a.content) LIKE '%$filter_input%'";
    }
    
    $announcementSql = "SELECT a.id as a_id, a.display_image as display_image, a.publish_date as publish_date, o.name as org_name, a.title as ann_title, a.content as ann_content FROM announcement a INNER JOIN organization_announcement oa ON a.id = oa.announcement_id INNER JOIN organization o ON oa.organization_id = o.id WHERE oa.is_active = 1 AND $where_clause_input_filter AND $where_clause";
    $announcementResult = mysqli_query($conn, $announcementSql);
    
    if(mysqli_num_rows($announcementResult) > 0){
        while($row = mysqli_fetch_assoc($announcementResult)){
            $a_id = $row['a_id'];
            $display_image = $row['display_image'];
            $publish_date = $row['publish_date'];
            $org_name = $row['org_name'];
            $ann_title = $row['ann_title'];
            $ann_content = $row['ann_content'];
            echo '
                <div class="col-md-6 px-3">
                    <div class="card d-flex align-content-stretch announcements-card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <input type="hidden" id="announcement_id" name="announcement_id" value="'.$a_id.'">
                            <img src="../../organization/admin/announcements/announcement_uploads/'.$display_image.'" class="img-fluid"/>
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                            </div>
                            <div class="card-body">
                            <div class="announcements-date-author mb-2"><label id="card_pub_date">'.$publish_date.'</label><span class="mx-2">/</span><label id="card_org">'.$org_name.'</label></div>
                            <h5 class="card-title mb-2">'.$ann_title.'</h5>
                            <p class="card-text multiline mb-3" title="multiline text with ellipsis">'.$ann_content.'</p>
                        
                            <a href="./announcements/announcement_details?aid='.$a_id.'" class="btn btn-read-more" target=”_blank”>Read More</a>
                        </div>
                    </div>
                </div>
            ';
        }
    }
?>