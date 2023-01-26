<?php
session_start();
include 'function/connection.php';
if (isset($_SESSION['username'])) {
    header('location: index.php', true, 301);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPM | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/55fb3c544d.js" crossorigin="anonymous"></script>
    <link href="./assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="row align-items-center h-90 p-5">
                    <div class="col-md-6 col-lg-5">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                            class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 offset-xl-1 px-6">
                        <form action="function/authentication.php" method="post">
                            <div class="p-2 d-flex justify-content-center align-items-center">
                                <h2>Login Page</h2>
                            </div>
                            <div class="form-group p-2">
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-user mt-3" name="username"
                                    aria-describedby="username" placeholder="Enter Username" autocomplete="off"
                                    required>
                            </div>
                            <div class="form-group p-2">
                                <label for="password">Password</label>
                                <input type="text" class="form-control form-control-user mt-3" name="password"
                                    aria-describedby="password" placeholder="Enter Password" autocomplete="off"
                                    required>
                            </div>
                            <div class="form-group p-2 row-button">
                                <button type="submit" name="submit"
                                    class="btn btn-primary btn-user btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>