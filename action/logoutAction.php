<?php
    // include "../libraries/instances.php";
    include "/var/www/html/AdminSphere/libraries/instances.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        
        $student->logout();
        header("location: ../index.php");

        exit();

    }
?>