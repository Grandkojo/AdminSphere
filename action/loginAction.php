<?php
// include "../libraries/instances.php";
require "/var/www/html/AdminSphere/libraries/instances.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = isset($_GET['meth']) ? $_GET['meth'] : "";
    $error = null;
    // var_dump($method); exit;                                                                                                    
    switch ($method) {
        case "stu":
            if (empty($_POST['email'])) {
                $error = "Enter your email";
            } else if (empty($_POST['pswd'])) {
                $error = "Enter your password;";
            } else {
                $email = $_POST['email'];
                $identity_key = $_POST['pswd'];
                $login_details = $student->login($email, $identity_key);
                // var_dump($login_details); exit;
                if ($login_details) {
                    list($email, $username, $id, $department_id) = $login_details;

                    $_SESSION['l_uinfo'] = [
                        'email' => $email,
                        'username' => $username,
                        'id' => $id,
                        'd_id' => $department_id
                    ];
                    // var_dump($_SESSION['l_uinfo']); exit;
                    header("location: ../views/studentIndex.php");
                } else {
                    // echo "Invalid email or password"; exit;      
                    $_SESSION['login_error'] = "Invalid email or password";
                    header("location: ../views/loginStudent.php");
                }
            }
            break;
        case "tea":
            // echo "Tea"; exit;
            if (empty($_POST['email'])) {
                $error = "Enter your email";
            } else if (empty($_POST['pswd'])) {
                $error = "Enter your password;";
            } else {
                $email = $_POST['email'];
                $identity_key = $_POST['pswd'];
                $login_details = $teacher->login($email, $identity_key);
                if ($login_details) {
                    list($email, $username, $id) = $login_details;

                    $_SESSION['l_uinfo'] = [
                        'email' => $email,
                        'username' => $username,
                        'id' => $id
                    ];
                    // var_dump($_SESSION['l_uinfo']); exit;
                    header("location: ../views/teacherIndex.php");
                } else {
                    // echo "Invalid email or password"; exit;      
                    $_SESSION['login_error'] = "Invalid email or password";
                    header("location: ../views/loginTeacher.php");
                }
            }
            break;

        default:
            echo "Entity login required!";
    }
}
