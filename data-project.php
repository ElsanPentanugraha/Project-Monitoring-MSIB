<?php
include 'function/crudfunction.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php', true, 301);
}

$leader = mysqli_query($connect, 'SELECT * FROM leaders');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIPM | Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/55fb3c544d.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #72b8ff;">
        <div class="container-fluid">
            <a class="navbar-brand d-inline-block" href="#">
                <i class="fa-solid fa-cubes" alt="Logo" width="30" height="24"
                    class="d-inline-block align-text-top"></i>
                Project Monitoring
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between py-3">
                <h5 class="m-0 font-weight-bold text-primary d-md-inline">Add Project</h5>

            </div>
            <div class="card-body">
                <form method="post" action="" class="row g-3">
                    <div class="col-md-12 mb-3">
                        <label for="project_name">Project Name</label>
                        <input class="form-control" type="text" name="project_name" value="<?= @$Tproject_name ?>"
                            id="project_name" autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="client_name">Client</label>
                        <input class="form-control" type="text" name="client_name" value="<?= @$Tclient_name ?>"
                            id="client_name" autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="leader_id">Project Leader</label>
                        <select class="selectpicker form-control" name="leader_id">
                            <?php if (isset($Tleader_id)) {
                                echo '
                                            <option selected value="' .
                                    $Tleader_id .
                                    '">' .
                                    $Tleader_name .
                                    '</option>
                                            ';
                                foreach ($leader as $tmp) {
                                    echo '
                                                
                                                <option value="' .
                                        $tmp['id'] .
                                        '">' .
                                        $tmp['leader_name'] .
                                        '</option>';
                                }
                            } else {
                                echo '<option selected value="">Select Leader</option>';
                                foreach ($leader as $tmp) {
                                    echo '
                                                
                                                <option value="' .
                                        $tmp['id'] .
                                        '">' .
                                        $tmp['leader_name'] .
                                        '</option>';
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="start_date">Start Date Project</label>
                        <input class="form-control" type="date" name="start_date" value="<?= @$Tstart_date ?>"
                            id="start_date" autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_date">End Date Project</label>
                        <input class="form-control" type="date" name="end_date" value="<?= @$Tend_date ?>" id="end_date"
                            autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="progress">Progress Project (%)</label>
                        <input class="form-control" type="text" name="progress" value="<?= @$Tprogress ?>"
                            id="client_name" autocomplete="off">
                    </div>
                    <div class="col-12 mb-3 d-flex">
                        <div class="col-6">
                            <button type="submit" name="submit" class="btn btn-primary float-right">Save</button>
                            <a href="index.php" type="back" name="back" class="btn btn-danger float-right">Back</a>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>