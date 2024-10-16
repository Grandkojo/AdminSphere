<?php
// echo "Delete item tadaa"; exit;
require  dirname(__FILE__).DIRECTORY_SEPARATOR."../../libraries/instances.php";

if (isset($_GET['id'])) {
    $assignment_id = $_GET['id'];

    $deleteStatus = $teacher->deleteAssignmentFile($assignment_id);

    if ($deleteStatus) {
        header("location: ../../views/teacherIndex.php?page=submitassignment");
    } else {
        header("location: ../../views/teacherIndex.php?page=submitassignment");
    }
}
