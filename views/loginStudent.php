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
    <title>Document</title>
</head>
<style>
    .container.mt-3 {
        width: 350px;
        border-color: blue;
        border: 3px dashed blue;
        border-radius: 15px;

    }

    body {
        height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<body>

    <div class="container mt-3">
        <form action="../action/loginAction.php?meth=stu" method="post">
            <h2 class="mt-3">Login</h2>
            <?php if (isset($_SESSION["login_error"])) { ?>

                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <p><?= $_SESSION["login_error"]; ?></p>
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