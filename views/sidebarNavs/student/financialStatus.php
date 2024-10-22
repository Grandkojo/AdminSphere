<?php
session_start();
// echo "Bankueeee";
// require "../../libraries/instances.php";
// exit;
// require "../libraries/instances.php";
$teacher_id = isset($_SESSION['l_uinfo']['id']) ? $_SESSION['l_uinfo']['id'] : "";
$departments = $teacher->getDepartments();
$data = $teacher->getData($teacher_id);
// var_dump($data); exit;
// var_dump($data); exit;
?>

<style>
    .container-fluid {
        display: flex;
        /* flex-direction: column; */
        width: 1700px;
        /* justify-content: center; */
        margin-left: 0;
        margin-right: 0;
        /* margin-left: 50px;
        margin-right: 10px; */
    }

    .left {
        width: 3300px;
        overflow-y: auto;
        /* Enable vertical scrolling */
        max-height: 600px;
        /* Set a max height for scrolling */
        padding-right: 20px;
        /* Space between table and line */
    }

    .vertical-line {
        width: 2px;
        /* Line thickness */
        background-color: black;
        /* Line color */
        margin: 0 10px;
        /* Spacing around the line */
        height: 700px;
    }

    .right {
        /* padding-left: 20px; */
        margin-left: 160px;
        margin-top: 80px;

        width: 1050px;

    }

    form {
        background-color: aliceblue;
        padding: 70px;
        border-radius: 10px;
        width: 550px;
    }

    /* td {
            max-width: 200px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        } */
</style>
</head>

<?php echo "Financial Status"; exit;?>
<div class="container-fluid mt-4 ms-5">
    <h2>COURSE MATERIALS</h2>
</div>

<div class="container-fluid">
    <div class="left">
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
                            <th>Material Description</th>
                            <th>Course Material</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $rowdata) { ?>
                            <tr>
                                <td><?= $rowdata['department_id'] ?></td>
                                <td><?= $rowdata['description'] ?></td>
                                <td><?= $rowdata["course_material"] ?><span><a href="../action/teacher/downloadAction.php?id=<?= $rowdata["course_id"] ?>"><i class="fa fa-download ms-2" aria-hidden="true"></i></a></span></td>
                                <td class="text-center"><span><a href="../action/teacher/deleteAction.php?id=<?= $rowdata["course_id"] ?>"><i id="deleteButton <?= $rowdata['course_id'] ?>" class="fa fa-2x fa-trash-o text-danger " aria-hidden="true"></i></a></span>
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
    </div>
    <div class="vertical-line"></div>
    <div class="right">
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
        <form action="../action/teacher/uploadMaterialAction.php" method="post" enctype="multipart/form-data">
            <h3><i class="fa fa-plus" aria-hidden="true"></i>
                Add Course Material</h3>
            <div class="form-group">
                <label for="description"><b>Description</b></label>
                <textarea class="form-control mt-3" placeholder="Enter short description students should know..." name="course_material_description" id="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="file_upload"><b>Course Material</b></label>
                <p class="text-danger m-2"> File type should be .pdf, .pptx or .docx</p>
                <input type="file" class="form-control mt-3" id="file_upload" name="file_upload" required>
                <div class="d-flex justify-content-end align-items-end mt-2">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </div>
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
                        text: "The course material has been deleted.",
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