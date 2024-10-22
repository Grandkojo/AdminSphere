<?php
session_start();
// require "../libraries/instances.php";
require "/var/www/html/AdminSphere/libraries/instances.php";
// echo "Require worked"; exit;

if (isset($_SESSION['l_uinfo'])) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AdminSphere | Teacher</title>
        <link rel="icon" href="../images/adminsphere_icon.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../index.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>
            ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }

            li {
                margin-top: 5%;
            }
        </style>
    </head>

    <body>
        <div class="background"></div>

        <?php
        require "./layouts/header.php";
        require "./layouts/sidebar.php";


        $page = isset($_GET['page']) ? strtolower($_GET['page']) : 'dashboard';

        // require "./sidebarNavs/dashboard.php";


        switch ($page) {
            case 'uploadmaterial':
                include './sidebarNavs/teacher/uploadMaterial.php';
                break;

            case 'gradeassignments':
                include './sidebarNavs/teacher/gradeAssignments.php';
                break;

            case 'settings':
                include './sidebarNavs/teacher/settings.php';
                break;

            case 'submitassignment':
                include './sidebarNavs/teacher/submitAssignment.php';
                break;

            case 'dashboard':
                include './sidebarNavs/teacher/dashboard.php';
                break;

            default:
                include './sidebarNavs/teacher/dashboard.php';
                break;
        }
        ?>

        <script>
            // Close the offcanvas when a link inside is clicked (for smaller screens)
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', () => {
                    let offcanvasElement = document.querySelector('#offcanvasSidebar');
                    let offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                    if (offcanvas) offcanvas.hide(); // Hide the offcanvas for smaller screens

                    // Tab switching logic
                    // Remove 'active' class from all tabs and contents
                    document.querySelectorAll('.nav-link').forEach(tab => tab.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

                    // Add 'active' class to the clicked tab and corresponding content
                    link.classList.add('active');
                    const selectedTab = link.getAttribute('data-tab');
                    document.getElementById(selectedTab).classList.add('active');
                });
            });
        </script>
    </body>

    </html>
<?php } else {
    header("location: ../index.php");
} ?>