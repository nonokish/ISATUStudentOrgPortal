<?php
require_once '../../../db.php';
?>
<?php
    $orgMediaSql = "SELECT m.id as media_id, m.file as file, m.type as media_type FROM media m";
    $orgMediaResult = mysqli_query($conn, $orgMediaSql);
    
    if(mysqli_num_rows($orgMediaResult) > 0){
        while($row = mysqli_fetch_assoc($orgMediaResult)){
            $media_id = $row['media_id'];
            $file = $row['file'];
            $media_type = $row['media_type'];

            if($media_type == "image"){
                echo '
                    <div class="col-md-4 px-2 mb-3">
                        <div class="view overlay" data-toggle="modal" data-target="#viewImageModal">
                            <img src="../../organization/admin/archives/media_upload/'.$file.'" class="img-fluid">
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
                            <source src="../../organization/admin/archives/media_upload/'.$file.'" type="video/mp4">
                        </video>
                    </div>
                ';
            }
        }
    }
?>