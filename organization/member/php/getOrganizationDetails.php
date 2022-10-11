<?php
require_once '../../db.php';

if (!isset($_SESSION['user_id'])){
        header('location:../../../');
    }else{
        $userId = $_SESSION['user_id'];
        $session_org_id = $_SESSION['org_id'];
        $sql = "SELECT * FROM user_organization WHERE user_id = '$userId' and organization_id = '$session_org_id'";
        $result = mysqli_query($conn,$sql);
        
        $user_org_data = mysqli_fetch_array($result);
        
        if(is_null($user_org_data)) {
            //TO DO...
            $orgId = $session_org_id;
            $orgName = null;
            $orgDateCreated = null;
            $createdBy = null;
            $orgTotalMember = null;
        }
        else
        {
            $orgId = $user_org_data['organization_id'];
            $sql2 = "SELECT * FROM organization WHERE id = '$orgId'";
            $result2 = mysqli_query($conn,$sql2);
            
            $org_data = mysqli_fetch_array($result2);
            
            if(is_null($org_data)) {
                //TO DO...
                $orgId = $session_org_id;
                $orgName = null;
                $orgDateCreated = null;
                $createdBy = null;
                $orgTotalMember = null;
            } else {
                $sql3 = "SELECT count(*) as total_member FROM user_organization WHERE organization_id = '$orgId'";
                $result3 = mysqli_query($conn,$sql3);
                
                $user_org_total = mysqli_fetch_array($result3);

                if(is_null($user_org_total)) {
                    //TO DO...
                    $orgId = $session_org_id;
                    $orgName = null;
                    $orgDateCreated = null;
                    $createdBy = null;
                    $orgTotalMember = null;
                }
                else
                {
                    $_SESSION['org_total_member'] = $user_org_total['total_member'];

                    $orgTotalMember = $_SESSION['org_total_member'];
                }
                //$_SESSION['org_id'] = $org_data['id'];
                $_SESSION['org_name'] = $org_data['name'];
                $_SESSION['org_date_created'] = $org_data['org_date_created'];
                $_SESSION['created_by'] = $org_data['created_by'];
                
                $orgId = $session_org_id;
                $orgName = $_SESSION['org_name'];
                $orgDateCreated = $_SESSION['org_date_created'];
                $createdBy = $_SESSION['created_by'];
            }
        }
    }
?>