<?php
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdminSphere</title>
  <link rel="icon" href="images/adminsphere_icon.png">
  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <style>
    .navbar.navbar-expand-sm.fixed-top {
      background-color: beige;
      height: 90px;

    }

    .adminsphere_logo {
      height: 80px;
      width: auto;
    }

    body {
      position: relative;
      margin: 0;
      height: 100vh;
      background-color: ghostwhite;
    }



    footer {
      background-color: whitesmoke;
      margin-top: 20px;
    }

    .def_size {
      height: 30px;
      width: auto;
      margin: 10px;

    }

    .def_size_1 {
      height: 80px;
      width: auto;
      margin: 10px;

    }

    .carousel-item img {
      height: 850px;
      width: 1900px;
      margin-top: 90px;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <?php
  if (isset($_SESSION['l_uinfo'])) { ?>
    <nav class="navbar navbar-expand-sm fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img class="adminsphere_logo" src="images/adminsphere_logo.png" alt="adminsphere_logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="collapsibleNavbar" style="margin-right: 80px;">
          <a href="#">Yeeeeee</a>
        </div>
      </div>
    </nav>
    <div style="margin-top: 90px;">
      <h3>You're logged in: your email: <?= $_SESSION['l_uinfo']['email'] ?> Your username: <?= $_SESSION['l_uinfo']['username'] ?></h3>
      <a href="action/logoutAction.php">logout</a>
    </div>

  <?php
  } else if (isset($_SESSION['uinfo'])) { ?>
    <nav class="navbar navbar-expand-sm fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img class="adminsphere_logo" src="images/adminsphere_logo.png" alt="adminsphere_logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="collapsibleNavbar" style="margin-right: 80px;">
        </div>

      </div>
    </nav>

    <div class="container-fluid" style="margin-top: 90px;">
      <h3>You're signed up: your email: <?= $_SESSION['uinfo']['email'] ?> Your username: <?= $_SESSION['uinfo']['username'] ?></h3>
      <a href="action/logoutAction.php">logout</a>
    </div>
  <?php
  } else { ?>

    <nav class="navbar navbar-expand-sm fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img class="adminsphere_logo" src="images/adminsphere_logo.png" alt="adminsphere_logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="collapsibleNavbar" style="margin-right: 80px;">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" style="width:90px; font-size:20px"><b>Login</b></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="views/loginStudent.php">Student</a></li>
                <li><a class="dropdown-item" href="views/loginTeacher.php">Teacher</a></li>
              </ul>
          </ul>
          </li>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" style="width:90px; font-size:20px"><b>Sign Up</b></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="views/signupStudent.php">Student</a></li>
                <li><a class="dropdown-item" href="views/signupTeacher.php">Teacher</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item">
          <img src="images/education.jpg" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item active">
          <img src="images/education2.png" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
          <img src="images/education.png" class="d-block w-100" alt="Slide 3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <main style="margin-bottom: 80px;">
      <div class="container-fluid d-flex justify-content-center align-items-center p-5">
        <p style="font-size: 20px">AdminSphere aims to bridge the gap between students, teachers as well as administrators.</p>
      </div>

      <div class="container-fluid d-flex justify-content-center align-items-center">
        <div style="margin-right: 120px; margin-left:100px;">
          <a href=""><img class="def_size_1" src="images/homework.png" alt="student">
          </a>
          <p style="white-space: pre-line;">
            Access your grades,
            submit assignments,
            check results and
            more when you login.
          </p>
        </div>
        <div style="margin-right: 120px; margin-left:120px">
          <a href=""><img class="def_size_1" src="images/lecture.png" alt="lecture"></a>
          <p style="white-space: pre-line;">
            Upload course material,
            monitor students,
            and grade students.
          </p>
        </div>
        <div style="margin-right: 120px; margin-left:120px"">
      <a href=""><img class=" def_size_1" src="images/administrator.png" alt="administrator"></a>
          <p style="white-space: pre-line;">
            Generate reports
            and analysis.
          </p>
        </div>
      </div>
    </main>
  <?php
  }
  ?>



  <footer>
    <div class="container-fluid d-flex justify-content-center align-items-center">
      <h3 style="color: black;"><b>© Adminsphere 2024<b></h3>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center">
      <a href="#"><img class="def_size" src="images/twitter.png" alt="twitter_icon"></a>
      <a href="#"><img class="def_size" src="images/linkedin.png" alt="linkedin_icon"></a>
      <a href="#"><img class="def_size" src="images/discord.png" alt="discord_icon"></a>
    </div>
  </footer>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let carousel = document.querySelector('#carouselExample');
      let carouselInstance = new bootstrap.Carousel(carousel, {
        interval: 5000,
        ride: 'carousel'
      });

      let isCarouselPaused = false;

      // Listen for visibility changes
      document.addEventListener('visibilitychange', function() {
        if (document.visibilityState === 'hidden') {
          carouselInstance.pause();
          isCarouselPaused = true;
        } else if (document.visibilityState === 'visible' && isCarouselPaused) {
          carouselInstance.cycle();
          isCarouselPaused = false;
        }
      });
    });
  </script>

</body>

</html>