<?php
session_start();
$dept_id = isset($_SESSION['l_uinfo']['d_id']) ? $_SESSION['l_uinfo']['d_id'] : "";
$data = $student->getAssignmentData($dept_id);

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

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    li {
        margin-top: 5%;
    }



    /* mobile 768px tablet 991px */
</style>
</head>


<div class="container-fluid mt-4" style="padding-left: 30px;">
    <h2><b>SUBMIT ASSIGNMENT</b></h2>
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
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Submit Assignment</button>
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
                            <tr class="table-primary text-center" style="font-weight: bolder;">
                                <th>ID</th>
                                <th>Instruction</th>
                                <th>Assignment</th>
                                <th>Time Remaining</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $rowdata) { ?>
                                <tr>
                                    <td><?= $rowdata['assignment_id'] ?></td>
                                    <td><?= $rowdata['instruction'] ?></td>
                                    <td><?= $rowdata["assignment_material"] ?><span><a href="../action/teacher/downloadAction.php?id=<?= $rowdata["assignment_id"] ?>"><i class="fa fa-download ms-2" aria-hidden="true"></i></a></span></td>
                                    <?php
                                    $startDateTime = $rowdata['start_datetime'];
                                    $endDateTime = $rowdata['due_datetime'];
                                    ?>
                                    <td class="text-center"><?= $student->assignmentStatus($startDateTime, $endDateTime); ?></td>
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


            <form class=mainForm action="../action/student/submitAssignmentAction.php" method="post" enctype="multipart/form-data">
                <h3><i class="fa fa-plus" aria-hidden="true"></i>
                    Submit Assignment</h3>


                <div class="form-group">
                    <label for="department"><b>Assignment ID:</b></label>
                    <select name="department" id="department" required>
                        <?php foreach ($data as $rowdata) {
                            $startDateTime = $rowdata['start_datetime'];
                            $endDateTime = $rowdata['due_datetime'];
                            $assignment_status = $student->assignmentStatus($startDateTime, $endDateTime);

                            if ($assignment_status != "Elapsed" && !str_contains($assignment_status, "Starts")) {
                        ?>
                                <option value="<?= $rowdata['assignment_id'] ?>"><?= $rowdata['assignment_id'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="file_upload"><b>Assignment</b></label>
                    <p class="text-danger m-2"> File type should be .pdf, .pptx or .docx</p>
                    <input type="file" class="form-control mt-3" id="file_upload" name="file_upload" required>

                </div>



                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>

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
                        Submit Assignment</h3>
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="form-group">
                    <form action="../action/student/submitAssignmentAction.php" method="post" enctype="multipart/form-data">
                        <?php
                        $status = "No assignments available for submission";

                        $options = '';  // Use this to store options

                        foreach ($data as $rowdata) {
                            $startDateTime = $rowdata['start_datetime'];
                            $endDateTime = $rowdata['due_datetime'];
                            $assignment_status = $student->assignmentStatus($startDateTime, $endDateTime);

                            if ($assignment_status != "Elapsed" && !str_contains($assignment_status, "Starts")) {
                                $status = null; // Reset status if there is at least one valid assignment
                                $options .= "<option value=\"{$rowdata['assignment_id']}\">{$rowdata['assignment_id']}</option>";
                            }
                        }

                        // If status is still set, display the message
                        if ($status) { ?>
                            <p style="color:red;"><?= $status ?></p>
                        <?php
                        } else {
                        ?>
                            <label for="department"><b>Assignment ID:</b></label>
                            <select name="department" id="department" required>
                                <?= $options ?>
                            </select>
                        <?php
                        }
                        ?>
                </div>


                <div class="form-group mt-3">
                    <label for="file_upload"><b>Assignment</b></label>
                    <p class="text-danger m-2"> File type should be .pdf, .pptx or .docx</p>
                    <input type="file" class="form-control mt-3" id="file_upload" name="file_upload" required>

                </div>



                <button type="submit" class="btn btn-primary mt-3">Submit</button>
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