<?php
require_once '../../../db.php';
?>
<?php
    $orgDocumentSql = "SELECT d.id as doc_id, d.document_name as org_document_name, d.description as org_description, d.file as file, d.date_created as doc_date_uploaded FROM document d WHERE d.is_active = 1";
    $orgDocumentResult = mysqli_query($conn, $orgDocumentSql);
    
    if(mysqli_num_rows($orgDocumentResult) > 0){
        echo'
            <table class="table">
                  <thead>
                    <tr>
                        <th scope="col">Document Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date Uploaded</th>
                        <th scope="col">Action</th>
                    </tr>
                      </thead>
                  <tbody id="dbDocumentsTable">
        ';
        while($row = mysqli_fetch_assoc($orgDocumentResult)){
            $doc_id = $row['doc_id'];
            $org_document_name = $row['org_document_name'];
            $org_description = $row['org_description'];
            $file = $row['file'];
            $doc_date_uploaded = $row['doc_date_uploaded'];
            echo '
                <tr>
                    <td>'.$org_document_name.'</td>
                    <td>'.$org_description.'</td>
                    <td>'.$doc_date_uploaded.'</td>
                    <td>
                        <a class="see-contents-link py-1 px-3" href="../../organization/admin/archives/document_upload/'.$file.'" download>Download</a>
                        <a class="delete-link py-1 px-3" onclick="deleteOrgDocument('.$doc_id.')" data-toggle="modal" data-target="#deleteAlert">Delete</a>
                    </td>
                </tr>
            ';
        }

        echo '
            </tbody>
        </table>
        ';
    }
?>