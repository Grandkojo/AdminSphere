<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <title>Document</title>
</head>
<style>
    .container.mt-3 {
        width: 350px;
        border-color: blue;
        border: 3px dashed blue;
        border-radius: 15px;
        background-color:aliceblue;

    }

    body {
        height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("../images/signup1.png");
        background-repeat: no-repeat;
        background-size: cover;
        filter: blur(7px);
        /* Apply blur only to the background */
        z-index: -1;
        /* Send it to the back */
    }

    .adminsphere_logo {
        height: 80px;
        width: auto;
    }

    .navbar.navbar-expand-sm.fixed-top {
        background-color: beige;
        height: 90px;

    }

    
</style>

<body>

    <div class="background"></div>

    <nav class="navbar navbar-expand-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img class="adminsphere_logo" src="../images/adminsphere_logo.png" alt="adminsphere_logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="collapsibleNavbar" style="margin-right: 80px;">
                <a href="../index.php" style="color: black;;;"><i class="fa fa-2x fa-home" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <form action="../action/loginAction.php?meth=stu" method="post">
            <h2 class="mt-3">Login</h2>
            <?php if (isset($_SESSION["login_error"])) { ?>

                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <p><?= $_SESSION["login_error"]; ?></p>
                    <?php unset($_SESSION["login_error"]); ?>
                </div>
            <?php
            } ?>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>

            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>>
</body>

</html>