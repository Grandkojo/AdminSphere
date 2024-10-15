<?php
    // include "../config.php";
    include "/var/www/html/AdminSphere/config.php";
    // include "../src/individual.php";
    include "/var/www/html/AdminSphere/src/individual.php";
    // include "../src/student/studentClass.php";
    include "/var/www/html/AdminSphere/src/student/studentClass.php";
    // include "../src/teacher/teacherClass.php";
    include "/var/www/html/AdminSphere/src/teacher/teacherClass.php";
    
    //instantiation
    $db = new DB();
    $student = new Student();
    $individual = new Individual();
    $teacher = new Teacher();
    // echo "Why?";

?>