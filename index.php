<?php
include 'function/crudfunction.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIPM | Dashboard</title>
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
                <h5 class="m-0 font-weight-bold text-primary d-md-inline">Data Project</h5>
                <a href="data-project.php?hal=add" class="btn btn-success  btn-icon-split text-right btn-sm">
                    <span class="icon text-white-100">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add Data</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>PROJECT NAME</th>
                                <th>CLIENT</th>
                                <th>PROJECT LEADER</th>
                                <th>START DATE</th>
                                <th>END DATE</th>
                                <th>PROGRESS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $tampilProject = mysqli_query(
                                $connect,
                                'SELECT * from projects JOIN leaders WHERE projects.leader_id = leaders.id'
                            );
                            while (
                                $data = mysqli_fetch_array($tampilProject)
                            ): ?>
                            <tr>
                                <td><?= $data['project_name'] ?></td>
                                <td><?= $data['client_name'] ?></td>
                                <td><?= $data['leader_name'] .
                                    '</br>' .
                                    $data['leader_email'] ?></td>
                                <td><?= $data['start_date'] ?></td>
                                <td><?= $data['end_date'] ?></td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar w-<?= $data[
                                            'progress'
                                        ] ?>" role="progressbar" aria-valuenow="<?= $data[
    'progress'
] ?>" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <p><?= $data['progress'] ?>%</p>
                                </td>
                                <td>
                                    <div method="post">
                                        <a href="index.php?&hal=delete&id=<?= $data[
                                            'id_project'
                                        ] ?>" class="btn btn-danger btn-icon-split btn-sm mb-2"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data project ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="data-project.php?&hal=edit&id=<?= $data[
                                            'id_project'
                                        ] ?>" class="btn btn-success btn-icon-split btn-sm mb-2">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                crossorigin="anonymous">
            </script>
</body>

</html>