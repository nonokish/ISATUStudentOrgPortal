<?php
require_once '../../db.php';
?>
<?php
    $orgSql = "SELECT o.id as o_id, o.org_image as org_image, oc.name as org_classification, o.name as org_name FROM organization o INNER JOIN organization_classification oc ON o.org_classification_id = oc.id";
    $orgResult = mysqli_query($conn, $orgSql);
    
    if(mysqli_num_rows($orgResult) > 0){
        while($row = mysqli_fetch_assoc($orgResult)){
            $o_id = $row['o_id'];
            $org_image = $row['org_image'];
            if($row['org_image']){
                $src = '../superadmin/organizations/add_organization/organization_uploads/'.$org_image.'';
            } else {
                $src = "../img/ISATULogo.png";
            }
            $org_classification = $row['org_classification'];
            $org_name = $row['org_name'];
            echo '
                <input type="hidden" id="org_id" name="org_id" value="'.$o_id.'">
                <div class="col-md-3 mb-4">
                    <a href="organization_home?oid='.$o_id.'" target="_blank">
                    <div class="card text-center organization-card">
                        <div class="card-header organization-counter">10+ new posts</div>
                        <div class="card-body">
                            <div class="organization-logo mb-4">
                            <img src="'.$src.'" alt="Organization Logo">
                            </div>
                            <h5 class="card-title organization-name" id="card_org_name">'.$org_name.'</h5>
                        </div>
                        <div class="card-footer text-muted org-classification" id="card_org_classification">'.$org_classification.'</div>
                        </div>
                    </a>
                </div>
            ';
        }
    }
?>