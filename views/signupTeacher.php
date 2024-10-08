<?php
require "../libraries/instances.php";
$departments = $teacher->getDepartments();
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
        <form action="../action/signupAction.php?meth=tea" method="post">
            <h2 class="mt-3">Sign Up</h2>
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" name="entity" id="entity" placeholder="Teacher" value="Teacher" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter your name" name="name" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="department">Department:</label>
                <select name="department" id="department" required>
                    <?php foreach ($departments as $department) { ?>

                        <option value="<?= strtolower($department['department_id']) ?>"><?= ucfirst(strtolower($department['department_name'])) ?></option>

                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>

            <div class="mb-3">
                <label for="gender">Select your gender:</label>
                <select name="gender" id="gender">
                    <option value="M">Male</option>
                    <option value="M">Female</option>
                </select>
            </div>
            <!-- <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div> -->
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </form>
    </div>>
</body>

</html>