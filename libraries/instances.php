<?php
    require  dirname(__FILE__).DIRECTORY_SEPARATOR."../config.php";
    require  dirname(__FILE__).DIRECTORY_SEPARATOR."../src/individual.php";
    require  dirname(__FILE__).DIRECTORY_SEPARATOR."../src/student/studentClass.php";
    require  dirname(__FILE__).DIRECTORY_SEPARATOR."../src/teacher/teacherClass.php";
    
    //instantiation
    $db = new DB();
    $student = new Student();
    $individual = new Individual();
    $teacher = new Teacher();
?>