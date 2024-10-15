<?php
    require "/var/www/html/AdminSphere/libraries/instances.php";
    
    if (isset($_GET['id'])) {

        $assignment_id = $_GET['id'];    
        $file = $teacher->getAssignmentFileContent($assignment_id);
        
        if ($file) {
            // Get file content and name
            $fileContent = $file['file_content'];  // BLOB data
            $fileName = $file['assignment_material'];  // File name
            
            
            // Set the headers to serve the file for download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Length: ' . strlen($fileContent));
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Expires: 0');
            
            // Output the file content
            echo $fileContent;
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "No file ID specified.";
    }
?>