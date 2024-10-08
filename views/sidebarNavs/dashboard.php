<?php
session_start();
// echo "Dashboard here!";
?>

<div>
    <div class="container-fluid mt-4 ms-5">
        <h2>DASHBOARD</h2>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-auto m-5">
            <div class="card" style="width:400px">
                <h4 class="card-title m-3 p-3">
                    <i class="fa fa-upload me-2" aria-hidden="true"></i>
                    <span>Upload course material</span>
                </h4>
                <a href="?page=uploadmaterial" class="btn btn-primary text-white <?= $page == "uploadmaterial" ? 'active' : '' ?> text-dark" data-tab="upload">
                    Upload Material <span><i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-auto m-5">
            <div class="card" style="width:400px">
                <h4 class="card-title m-3 p-3">
                    <i class="fa fa-file-word-o me-2" aria-hidden="true"></i>
                    <span>Grade Assignments</span>
                </h4>
                <a href="?page=uploadmaterial" class="btn btn-primary text-white <?= $page == "gradeassignments" ? 'active' : '' ?> text-dark" data-tab="upload">
                    Grade Assignments <span><i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-auto m-5">
            <div class="card" style="width:400px">
                <h4 class="card-title m-3 p-3">
                    <i class="fa fa-plus me-2" aria-hidden="true"></i>
                    <span>Submit Assignment</span>
                </h4>
                <a href="?page=submitassignment" class="btn btn-primary text-white <?= $page == "submitassignment" ? 'active' : '' ?> text-dark" data-tab="upload">
                    Submit Asssignments <span><i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>