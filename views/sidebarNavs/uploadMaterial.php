<?php
session_start();
include "../../libraries/instances.php";
$teacher_id = isset($_SESSION['l_uinfo']['id']) ? $_SESSION['l_uinfo']['id'] : "";
// var_dump($teacher_id); exit;
// $teacher->getData($teacher_id);
// echo "yes"; exit;
// var_dump($data); exit;
?>

<style>
    .container {
        display: flex;
        margin-left: 50px;
        margin-right: 10px;
    }

    .left {
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

        width: 950px;

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


<div class="container-fluid mt-4 ms-5">
    <h2>COURSE MATERIALS</h2>
</div>

<div class="container">
    <div class="left m-5" style="width: 1200px">
        <div class="table-responsive-md table-responsive-sm">
            <table class="table table-hover table-sm">
                <thead>
                    <tr class="table-primary" style="font-weight: bolder;">
                        <th>Department</th>
                        <th>Material Description</th>
                        <th>Course Material</th>
                        <!-- <th>Lastname</th>
                            <th>Email</th> -->

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John</td>
                        <td>Doebhbkgvlsdmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmlfdglbkkfndfsncdfbsgkjsnlvgbnoeafmvgmbneavfkgbnoeav</td>
                        <td>john@example.com</td>
                        <!-- <td>john@example.com</td>
                            <td>john@example.com</td> -->

                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td>mary@example.com</td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="vertical-line"></div>
    <div class="right">
        <form action="../../action/teacher/uploadMaterialAction.php" method="post">
            <h3><i class="fa fa-plus" aria-hidden="true"></i>
                Add Course Material</h3>
            <div class="form-group">
                <label for="firstname">Description</label>
                <textarea class="form-control" placeholder="Enter short description students should know..." name="course_material_description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label for="file_content">Course Material</label>
                <input type="file" class="form-control" id="file_content" name="file_content">
                <div class="d-flex justify-content-end align-items-end mt-2">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <select name="department" id="department">
                    <option value="coe">Computer Engineering</option>
                    <option value="cos">Computer Science</option>
                    <option value="llb">Law</option>
                    <option value="pce">Petrochemical Engineering</option>
                    <option value="acs">Actuarial Science</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>