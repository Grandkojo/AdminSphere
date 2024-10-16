<?php
session_start();
require  dirname(__FILE__).DIRECTORY_SEPARATOR."../../libraries/instances.php";
$teacher_id = isset($_SESSION['l_uinfo']['id']) ? $_SESSION['l_uinfo']['id'] : "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = null;
    if (empty($_POST['assignment_material_instruction'])) {
        $error = "Instruction needed";
    } else if (empty($_POST['department'])) {
        $error = "Department needed";
    }else if (empty($_POST['start_datetime'])) {
        $error = "Start datetime needed";
    }else if (empty($_POST['due_datetime'])) {
        $error = "Due datetime needed";
    } else {
        $uploadOk = 1;
        $assignment_material_instruction = $_POST['assignment_material_instruction'];
        $department_id = $_POST['department'];
        $start_datetime = $_POST['start_datetime'];
        $due_datetime = $_POST['due_datetime'];
        
        $targetFile = basename($_FILES["file_upload"]["name"]);

        $mimeType = $_FILES["file_upload"]["type"];

        $tempFile = $_FILES["file_upload"]["tmp_name"];

        // Get the actual content of the file
        $fileContent = file_get_contents($tempFile);
        
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        //set max file size to 5mb
        $file_size = 5242880;

        if ($_FILES["file_upload"]["size"] > $file_size) {
            $error = "File too large!";
            $uploadOk = 0;
        }
        
        if ($fileType != 'pdf' && $fileType != 'pptx' && $fileType != 'docx') {
            $error = "Sorry, file type is not accepted";
            $uploadOk = 0;
        }

        //check if file has been submitted before
        $assignment_uploaded = $teacher->getAssignments($teacher_id, $targetFile);
        
        if ($assignment_uploaded) {
            $error = "Assignment already exists";
            $uploadOk = 0;
        }
        
        //handle submission
        if ($uploadOk == 0) {
            $_SESSION["error"] = $error;
            header("location: ../../views/teacherIndex.php?page=submitassignment");
        } else {
            $uploasdStatus = $teacher->submitAssignment($assignment_material_instruction, (int) $department_id, $targetFile, $teacher_id, $fileContent, $start_datetime, $due_datetime);
            // echo "Comme ca?"; exit;

            if (!$uploasdStatus) {
                $_SESSION['upload_failure'] = "An error occured uploading your document, try again.";
                header("location: ../../views/teacherIndex.php?page=submitassignment");
            } else {
                $_SESSION['upload_success'] = "Assignment uploaded succesfully.";
                header("location: ../../views/teacherIndex.php?page=submitassignment");
            }
        }
    }
}
