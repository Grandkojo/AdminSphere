<?php
session_start();
// echo "Bankueeee";
// require "../../libraries/instances.php";
// exit;
// require "../libraries/instances.php";
$teacher_id = isset($_SESSION['l_uinfo']['id']) ? $_SESSION['l_uinfo']['id'] : "";
$departments = $teacher->getDepartments();
$data = $teacher->getAssignmentData($teacher_id);
// var_dump($data); exit;
// var_dump($data); exit;
?>

<style>
    .mainForm {
        background-color: aliceblue;
        padding: 70px;
        border-radius: 10px;
        width: 70%;
    }

    .addButton {
        display: none;
    }


    .container-fluid.errorMessage {
        display: flex;
        align-content: center;
        justify-content: center;

    }

    @media (max-width: 768px) {
        .container-fluid.mt-4 {
            text-align: center;
            margin-bottom: 20px;
        }

        .addButton {
            display: block !important;
            text-align: end;
            margin-right: 25px;
        }



        .mainForm {
            display: none;

        }

        .container-fluid.errorMessage {
            display: flex;
            align-content: center;
            justify-content: center;

        }
    }

    @media (max-width: 991px) {
        .container-fluid.mt-4 {
            text-align: center;
            margin-bottom: 20px;
        }

        .addButton {
            display: block !important;
            text-align: end;
            margin-right: 25px;
        }



        .mainForm {
            display: none;

        }

        .container-fluid.errorMessage {
            display: flex;
            align-content: center;
            justify-content: center;

        }
    }




    /* mobile 768px tablet 991px */
</style>
</head>


<div class="container-fluid mt-4 ps-4">
    <h2>SUBMIT ASSIGNMENT</h2>
</div>

<div class="container-fluid">


    <!-- <div class="left"> -->
    <div class="container-fluid errorMessage">

        <?php if (isset($_SESSION["error"])) { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                <b> <?= $_SESSION['error'] ?> </b>
                <?php unset($_SESSION['error']);
                ?>
            </div>
        <?php
        } else if (isset($_SESSION["upload_success"])) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                <b><?= $_SESSION['upload_success'] ?></b>
                <?php unset($_SESSION['upload_success']);
                ?>
            </div>
        <?php
        } else if (isset($_SESSION["upload_failure"])) { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                <b><?= $_SESSION['upload_failure'] ?></b>
                <?php unset($_SESSION['upload_failure']);
                ?>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-6">
            <div class="addButton">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Assignment</button>
            </div>
            <?php if (is_string($data)) { ?>
                <div class="container p-5">
                    <i class="fa fa-2x fa-exclamation-triangle mt-5" aria-hidden="true"></i>
                    <p><?= $data; ?></p>
                </div>
            <?php
            } else { ?>
                <div class="table-responsive m-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary" style="font-weight: bolder;">
                                <th>Department</th>
                                <th>Instruction</th>
                                <th>Assignment</th>
                                <th>Time Remaining</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $rowdata) { ?>
                                <tr>
                                    <td><?= $rowdata['department_id'] ?></td>
                                    <td><?= $rowdata['instruction'] ?></td>
                                    <td><?= $rowdata["assignment_material"] ?><span><a href="../action/teacher/downloadAction.php?id=<?= $rowdata["assignment_id"] ?>"><i class="fa fa-download ms-2" aria-hidden="true"></i></a></span></td>
                                    <?php 
                                        $startDateTime = $rowdata['start_datetime'];
                                        $endDateTime = $rowdata['end_datetime'];
                                    ?>
                                    <td><?= $teacher->assignmentStatus($startDateTime, $endDateTime);?></td>

                                    <td>

                                        <a href="../action/teacher/editAction.php?id=<?= $rowdata['assignment_id'] ?>">
                                            <i class="fa fa-2x text-primary fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="../action/teacher/deleteAction.php?id=<?= $rowdata['assignment_id'] ?>">
                                            <i id="deleteButton<?= $rowdata['assignment_id'] ?>" class="fa fa-2x fa-trash-o text-danger" aria-hidden="true"></i>
                                        </a>
                                    </td>


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
            <!-- </div> -->
        </div>

        <div class="col-md-12 col-sm-12 col-lg-6 d-flex justify-content-center">
            <!-- <center> -->


            <!-- <div class="formDiv"> -->
            <form class=mainForm action="../action/teacher/submitAssignmentAction.php" method="post" enctype="multipart/form-data">
                <h3><i class="fa fa-plus" aria-hidden="true"></i>
                    Add Assignment</h3>
                <div class="form-group">
                    <label for="assignment_material_instruction"><b>Instruction</b></label>
                    <textarea class="form-control mt-3" placeholder="Enter short description students should know..." name="assignment_material_instruction" id="assignment_material_instruction" required></textarea>
                </div>
                <div class="form-group">
                    <label for="file_upload"><b>Assignment</b></label>
                    <p class="text-danger m-2"> File type should be .pdf, .pptx or .docx</p>
                    <input type="file" class="form-control mt-3" id="file_upload" name="file_upload" required>
                    <!-- <div class="d-flex justify-content-end align-items-end mt-2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div> -->
                </div>

                <div class="form-group mb-3 mt-4">
                    <label for="start_date "><b>Start Date & Time:</b></label>
                    <input type="datetime-local" name="start_datetime" id="start_datetime" required>
                </div>


                <div class="form-group mb-3">
                    <label for="start_date"><b>Due Date & Time:</b></label>
                    <input type="datetime-local" name="due_datetime" id="due_datetime" required>
                </div>
                <div class="form-group">
                    <label for="department"><b>Department:</b></label>
                    <select name="department" id="department" required>
                        <?php foreach ($departments as $department) { ?>

                            <option value="<?= strtolower($department['department_id']) ?>"><?= ucfirst(strtolower($department['department_name'])) ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Upload</button>
            </form>
            <!-- </div> -->

            <!-- </center> -->
        </div>
    </div>
</div>


<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">
                    <h3><i class="fa fa-plus" aria-hidden="true"></i>
                        Add Assignment</h3>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="../action/teacher/submitAssignmentAction.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="assignment_material_instruction"><b>Instruction</b></label>
                        <textarea class="form-control mt-3" placeholder="Enter short description students should know..." name="assignment_material_instruction" id="assignment_material_instruction" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_upload"><b>Assignment</b></label>
                        <p class="text-danger m-2"> File type should be .pdf, .pptx or .docx</p>
                        <input type="file" class="form-control mt-3" id="file_upload" name="file_upload" required>
                        <!-- <div class="d-flex justify-content-end align-items-end mt-2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </div> -->
                    </div>

                    <div class="form-group mb-3 mt-4">
                        <label for="start_date "><b>Start Date & Time:</b></label>
                        <input type="datetime-local" name="start_date" id="start_date" required>
                    </div>


                    <div class="form-group mb-3">
                        <label for="start_date"><b>Due Date & Time:</b></label>
                        <input type="datetime-local" name="start_date" id="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="department"><b>Department:</b></label>
                        <select name="department" id="department" required>
                            <?php foreach ($departments as $department) { ?>

                                <option value="<?= strtolower($department['department_id']) ?>"><?= ucfirst(strtolower($department['department_name'])) ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Upload</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Attach event listeners for all delete buttons
    document.querySelectorAll('[id^="deleteButton"]').forEach(function(deleteButton) {
        deleteButton.addEventListener('click', function(event) {
            event.preventDefault();

            // Get the URL from the parent anchor tag
            var targetUrl = deleteButton.parentElement.href;

            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to delete this file? This action cannot be undone.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "The assignment material has been deleted.",
                        icon: "success",
                        confirmButtonText: "Ok"
                    }).then(() => {
                        // Redirect to the target URL
                        window.location.href = targetUrl;
                    });
                }
            });
        });
    });
</script>