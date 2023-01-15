<?php
require_once '../../../../db.php';
?>
<?php
    $org_id = $_SESSION['org_id'];
    echo "<script>console.log('org_id: " . $org_id . "' );</script>";
    $orgMediaSql = "SELECT m.id as media_id, m.file as file, m.type as media_type FROM media m WHERE m.organization_id = '$org_id'";
    $orgMediaResult = mysqli_query($conn, $orgMediaSql);
    
    if(mysqli_num_rows($orgMediaResult) > 0){
        while($row = mysqli_fetch_assoc($orgMediaResult)){
            $media_id = $row['media_id'];
            $file = $row['file'];
            $media_type = $row['media_type'];
            echo "<script>console.log('file: " . $file . "' );</script>";

            if($media_type == "image"){
                echo '
                    <div class="col-md-4 px-2 mb-3">
                        <div class="view overlay" data-toggle="modal" data-target="#viewImageModal">
                            <img src="./media_upload/'.$file.'" class="img-fluid media_img">
                            <a>
                                <div class="mask waves-effect rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                ';
            } else if($media_type == "video"){
                echo '
                    <div class="col-md-4 px-2 mb-4">
                        <video width="100%" height="100%" controls>
                            <source src="./media_upload/'.$file.'" type="video/mp4">
                        </video>
                    </div>
                ';
            }
        }
    }
?>