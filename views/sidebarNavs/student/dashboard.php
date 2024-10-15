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
                    <i class="fa fa-book me-2" aria-hidden="true"></i>
                    <span>Course Materials</span>
                </h4>
                <a href="?page=coursematerials" class="btn btn-primary text-white <?= $page == "coursematerials" ? 'active' : '' ?> text-dark" data-tab="upload">
                    Course Materials <span><i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-auto m-5">
            <div class="card" style="width:400px">
                <h4 class="card-title m-3 p-3">
                    <i class="fa fa-upload me-2" aria-hidden="true"></i>
                    <span>Submit Assignment</span>
                </h4>
                <a href="?page=submitassignment" class="btn btn-primary text-white <?= $page == "submitassignment" ? 'active' : '' ?> text-dark" data-tab="upload">
                    Submit Assignment <span><i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-auto m-5">
            <div class="card" style="width:400px">
                <h4 class="card-title m-3 p-3">
                    <i class="fa fa-file-word-o me-2" aria-hidden="true"></i>
                    <span>Access Grades</span>
                </h4>
                <a href="?page=accessgrades" class="btn btn-primary text-white <?= $page == "accessgrades" ? 'active' : '' ?> text-dark" data-tab="upload">
                    Access Grades <span><i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-auto m-5">
            <div class="card" style="width:400px">
                <h4 class="card-title m-3 p-3">
                    <i class="fa fa-credit-card-alt me-2" aria-hidden="true"></i>
                    <span>Financial Status</span>
                </h4>
                <a href="?page=financialstatus" class="btn btn-primary text-white <?= $page == "financialstatus" ? 'active' : '' ?> text-dark" data-tab="upload">
                    Financial Status <span><i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>