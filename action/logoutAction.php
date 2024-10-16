<?php
    // include "../libraries/instances.php";
    require  dirname(__FILE__).DIRECTORY_SEPARATOR."../libraries/instances.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        
        $student->logout();
        header("location: ../index.php");

        exit();

    }
?>