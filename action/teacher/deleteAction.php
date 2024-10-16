<?php
// echo "Delete item tadaa"; exit;
require  dirname(__FILE__).DIRECTORY_SEPARATOR."../libraries/instances.php";

if (isset($_GET['id'])) {
    $course_id = $_GET['id'];

    $deleteStatus = $teacher->deleteFile($course_id);

    if ($deleteStatus) {
        header("location: ../../views/teacherIndex.php?page=uploadmaterial");
    } else {
        header("location: ../../views/teacherIndex.php?page=uploadmaterial");
    }
}
