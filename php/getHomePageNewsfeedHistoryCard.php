<?php
require_once '../db.php';
?>
<?php
    function get_time_ago($time){
        $time_difference = time() - $time;

        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;

            if( $d >= 1 )
            {
                $t = round( $d );
                return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }

    $filter_input = $_GET['filter_input'];
    $filter = $_GET['filter'];
    $where_clause_input_filter = "LOWER(n.caption) LIKE '%%'";

    if($filter == "all") {
        $where_clause = "1=1";
    } else if($filter == "today") {
        $where_clause = "n.publish_date = CURDATE()";
    } else if($filter == "this_week") {
        $where_clause = "YEARWEEK(n.publish_date) = YEARWEEK(NOW())";
    } else if($filter == "this_month") {
        $where_clause = "(YEAR(n.publish_date) = YEAR(CURDATE()) AND MONTH(n.publish_date) = MONTH(CURDATE()))";
    } else if($filter == "this_year") {
        $where_clause = "YEAR(n.publish_date) = YEAR(CURDATE())";
    }

    if($filter_input == "") {
        $where_clause_input_filter = "LOWER(n.caption) LIKE '%%'";
    } else {
        $where_clause_input_filter = "LOWER(n.caption) LIKE '%$filter_input%'";
    }
    
    $newsfeedSql = "SELECT n.id as n_id, n.display_image as display_image, n.publish_date as publish_date, n.publish_time as publish_time, o.name as org_name, n.caption as n_caption FROM newsfeed n INNER JOIN organization_newsfeed onf ON n.id = onf.newsfeed_id INNER JOIN organization o ON onf.organization_id = o.id WHERE $where_clause_input_filter AND $where_clause ORDER BY n.publish_date DESC,n.publish_time DESC";
    $newsfeedResult = mysqli_query($conn, $newsfeedSql);
    
    if(mysqli_num_rows($newsfeedResult) > 0){
        while($row = mysqli_fetch_assoc($newsfeedResult)){
            $n_id = $row['n_id'];
            $display_image = $row['display_image'];
            $publish_date = $row['publish_date'];
            $publish_time = $row['publish_time'];
            $org_name = $row['org_name'];
            $n_caption = $row['n_caption'];
            
            $publish_date_time = $publish_date." ".$publish_time;
            $publish_timestamp = strtotime($publish_date_time);
            $publish_time_ago = get_time_ago($publish_timestamp);
            
            echo '
                <div class="col-md-12">
                    <div class="card nf-post-card py-5 px-5">
                        <div class="nf-post-body mb-4">
                            <div class="nf-post-org-name">'.$org_name.'</div>
                            <div class="nf-post-date-author mb-2">Posted '.$publish_time_ago.'</div>
                            <div class="nf-post-caption">
                            '.$n_caption.'
                            </div>
                        </div>
                        <img src="organization/admin/newsfeed/newsfeed_uploads/'.$display_image.'" class="nf-post-img" alt="Post Image"/>
                    </div>
                </div>
            ';
        }
    }
?>