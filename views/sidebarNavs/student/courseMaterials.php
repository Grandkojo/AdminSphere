<?php
session_start();
// echo "kkk"; exit;
// include "/var/www/html/ /libraries/instances.php";
$dept_id = isset($_SESSION['l_uinfo']['d_id']) ? $_SESSION['l_uinfo']['d_id'] : "";
// var_dump($dept_id); exit;

if ($dept_id) {
    $data = $student->getCourses($dept_id);
    // echo "Perfect"; exit;
} else {
    echo "Student and department ids needed";
    exit;
}
?>
<div class="container-fluid mt-5">
    <h2 class="mb-5 ms-5">COURSE MATERIALS</h2>
    <?php if (is_string($data)) { ?>
        <div class="container p-5">
            <i class="fa fa-3x fa-exclamation-triangle mt-5" aria-hidden="true"></i>
            <h3><?= $data; ?></h3>
            <p>Kindly contact your respective lecturer</p>

        </div>
    <?php
    } else { ?>
        <div class="table-responsive table-responsive-sm m-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary" style="font-weight: bolder;">
                        <!-- <th>Department</th> -->
                        <th>Material Description</th>
                        <th>Course Material</th>
                        <!-- <th>Action</th> -->

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $rowdata) { ?>
                        <tr>
                            <!-- <td><?= $rowdata['department_id'] ?></td> -->
                            <td><?= $rowdata['description'] ?></td>
                            <td><?= $rowdata["course_material"] ?><span><a href="../action/teacher/downloadAction.php?id=<?= $rowdata["course_id"] ?>"><i class="fa fa-download ms-2" aria-hidden="true"></i></a></span></td>
                            <!-- <td class="text-center"><span><a href="../action/teacher/deleteAction.php?id=<?= $rowdata["course_id"] ?>"><i id="deleteButton <?= $rowdata['course_id'] ?>" class="fa fa-2x fa-trash-o text-danger " aria-hidden="true"></i></a></span> -->
                            <!-- </td> -->
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <?php
    }
    ?>
</div>