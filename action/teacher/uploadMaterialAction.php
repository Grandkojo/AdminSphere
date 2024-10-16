<?php
session_start();
require  dirname(__FILE__).DIRECTORY_SEPARATOR."../../libraries/instances.php";
$teacher_id = isset($_SESSION['l_uinfo']['id']) ? $_SESSION['l_uinfo']['id'] : "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = null;
    if (empty($_POST['course_material_description'])) {
        $error = "Course material description needed";
    } else if (empty($_POST['department'])) {
        $error = "Department needed";
    } else {
        $uploadOk = 1;
        $course_material_description = $_POST['course_material_description'];
        $department_id = $_POST['department'];

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
        $courses_uploaded = $teacher->getCourses($teacher_id, $targetFile);

        if ($courses_uploaded) {
            $error = "Course material already exists";
            $uploadOk = 0;
        }

        //handle submission
        if ($uploadOk == 0) {
            $_SESSION["error"] = $error;
            header("location: ../../views/teacherIndex.php?page=uploadmaterial");
        } else {
            $uploasdStatus = $teacher->uploadMaterial($course_material_description, (int) $department_id, $targetFile, $teacher_id, $fileContent);

            if (! $uploasdStatus) {
                $_SESSION['upload_failure'] = "An error occured uploading your document, try again.";
                header("location: ../../views/teacherIndex.php?page=uploadmaterial");
            } else {
                $_SESSION['upload_success'] = "Course material uploaded succesfully.";
                header("location: ../../views/teacherIndex.php?page=uploadmaterial");
            }
        }
    }
}
