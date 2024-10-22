<?php
session_start();
// echo "Dashboard here!";
?>
<style>
    .container-fluid.container-card {
        border: 2px solid black;
        width: 450px;
        padding: 10px;
        margin: 30px;
        height: auto;
        border-radius: 9px;
        box-shadow: 5px 5px 5px black;
    }

    a {
        text-decoration: none;
        color: black;
    }


    .c-item img {
        width: 120px;
        height: auto;
    }
</style>
<div>
    <div class="container-fluid mt-4" style="padding-left: 30px;">
        <h2><b>DASHBOARD</b></h2>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-4 col-sm-12 col-12">
            <a href="?page=coursematerials" <?= $page == "coursematerials" ? 'active' : '' ?>>
                <div class="container-fluid container-card" style=" background-color:aliceblue;">
                    <div class="row">
                        <div class="col-7">
                            <ul>
                                <li>
                                    <h4><b>Course Materials</b></h4>
                                </li>
                                <li>
                                    <h5>Total Materials: 5</h5>
                                </li>
                            </ul>

                        </div>
                        <div class="col-5 text-end mb-2">

                            <div class="c-item">
                                <img src="../images/library.png" alt="material">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-12 col-lg-4 col-sm-12 col-12">
            <a href="?page=submitassignment" <?= $page == "submitassignment" ? 'active' : '' ?>>
                <div class="container-fluid container-card" style=" background-color:beige;">
                    <div class="row">
                        <div class="col-7">
                            <ul>
                                <li>
                                    <h4><b>Submit <br> Assignment</b></h4>
                                </li>
                                <li>
                                    <h5>Total Pending: 5</h5>
                                </li>
                            </ul>

                        </div>
                        <div class="col-5 text-end mb-2">

                            <div class="c-item">
                                <img src="../images/school.png" alt="material">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-12 col-lg-4 col-sm-12 col-12">
            <a href="?page=accessgrades" <?= $page == "accessgrades" ? 'active' : '' ?>>
                <div class="container-fluid container-card" style=" background-color:darkgrey;">
                    <div class="row">
                        <div class="col-7">
                            <ul>
                                <li>
                                    <h4><b>Access <br> Grades</b></h4>
                                </li>
                                <li>
                                    <h5>Current GPA: 5</h5>
                                </li>
                            </ul>

                        </div>
                        <div class="col-5 text-end">

                            <div class="c-item mt-2">
                                <img src="../images/grade.png" alt="material">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-12 col-lg-4 col-sm-12 col-12">
            <a href="?page=financialstatus" <?= $page == "financialstatus" ? 'active' : '' ?>>
                <div class="container-fluid container-card" style=" background-color:antiquewhite;">
                    <div class="row">
                        <div class="col-7">
                            <ul>
                                <li>
                                    <h4><b>Financial <br> Status</b></h4>
                                </li>
                                <li>
                                    <h5>Status: 5</h5>
                                </li>
                            </ul>

                        </div>
                        <div class="col-5 text-end">

                            <div class="c-item mt-2">
                                <img src="../images/financial.png" alt="material">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>



    </div>