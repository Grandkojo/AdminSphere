<?php
    require_once "../src/individual.php";
    require_once "../src/student/studentClass.php";
    require_once "../config.php";
    require_once "../src/teacher/teacherClass.php";

    //instantiation
    $db = new DB();
    $student = new Student();
    $individual = new Individual();
    $teacher = new Teacher();

?>