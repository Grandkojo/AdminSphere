<?php
include "../libraries/instances.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = isset($_GET['meth']) ? $_GET['meth'] : "";
    // var_dump($method); exit;
    switch ($method) {
        case "stu":
            if (empty($_POST['email'])) {
                $error = "Please enter your email";
            } else if (empty($_POST['name'])) {
                $name = "Please enter your name";
            } else if (empty($_POST['pswd'])) {
                $error = "Please enter your password";
            } else if (empty($_POST['gender'])) {
                $error = "Please choose your gender";
            } else if (empty($_POST['entity'])) {
                $error = "User entity is required";
            } else if (empty($_POST['department'])) {
                $error = "Department is required";
            } else {

                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $password = $_POST['pswd'];
                $name = $_POST['name'];
                $department_id = $_POST['department'];
                $entity = $_POST['entity'];



                $student->generateUniqueId();
                // var_dump($student->getUniqueId());exit;
                $uniqueId = $student->getUniqueId();

                $student->setFullProps($uniqueId, $name, $email, $gender, $password, $department_id);
                $signup = $student->signup();
               
                if ($signup) {
                    $_SESSION['uinfo'] = [
                        'email' => $email,
                        'username'  => $name
                    ];
                    // header("location: ../index.php");
                    header("location: ../views/loginStudent.php");
                } else {
                    echo "Error signing up, try again";
                    header("location: " . $_SERVER['PHP_SELF']);
                }
                break;
            }
            break;

        case "tea":
            if (empty($_POST['email'])) {
                $error = "Please enter your email";
            } else if (empty($_POST['name'])) {
                $name = "Please enter your name";
            } else if (empty($_POST['pswd'])) {
                $error = "Please enter your password";
            } else if (empty($_POST['gender'])) {
                $error = "Please choose your gender";
            } else if (empty($_POST['entity'])) {
                $error = "User entity is required";
            } else if (empty($_POST['department'])) {
                $error = "Department is required";
            } else {

                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $password = $_POST['pswd'];
                $name = $_POST['name'];
                $department_id = $_POST['department'];
                $entity = $_POST['entity'];



                $teacher->generateUniqueId();
                $uniqueId = $teacher->getUniqueId();

                $teacher->setFullProps($uniqueId, $name, $email, $gender, $password, $department_id);
                $signup = $teacher->signup();
                if ($signup) {
                    $_SESSION['uinfo'] = [
                        'email' => $email,
                        'username'  => $name
                    ];
                    // header("location: ../index.php?meth=tea");
                    header("location: ../views/loginTeacher.php");
                } else {
                    echo "Error signing up, try again";
                    header("location: " . $_SERVER['PHP_SELF']);
                }
                break;
            }
            break;
    }
}
