<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    if ($_GET['hal'] == 'add') {
        addData();
    } elseif ($_GET['hal'] == 'edit') {
        $getid = $_GET['id'];
        editData();
    }
}

if (isset($_GET['hal'])) {
    if ($_GET['hal'] == 'edit') {
        //menampung data untuk edit
        $selectData = mysqli_query(
            $connect,
            "SELECT * FROM projects JOIN leaders WHERE projects.leader_id = leaders.id AND projects.id_project = '$_GET[id]'"
        );
        $tampilData = mysqli_fetch_array($selectData);
        if ($tampilData) {
            $Tid_project = $tampilData['id_project'];
            $Tproject_name = $tampilData['project_name'];
            $Tclient_name = $tampilData['client_name'];
            $Tstart_date = $tampilData['start_date'];
            $Tend_date = $tampilData['end_date'];
            $Tprogress = $tampilData['progress'];
            $Tleader_id = $tampilData['leader_id'];
            $Tleader_name = $tampilData['leader_name'];
        }
    } elseif ($_GET['hal'] == 'delete') {
        deleteData();
    }
}

function addData()
{
    global $connect;
    $project_name = $_POST['project_name'];
    $client_name = $_POST['client_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $progress = $_POST['progress'];
    $leader_id = $_POST['leader_id'];

    $query = "INSERT INTO projects (project_name, client_name, start_date, end_date, progress, leader_id) 
         VALUES ('$project_name', '$client_name', '$start_date', '$end_date', '$progress', '$leader_id')";
    if (mysqli_query($connect, $query)) {
        echo "
                <script>
                    alert('Success adding data!')
                    window.location.href = 'index.php?page=data-project'
                </script>";
    } else {
        echo "
                <script>
                    alert('Cant adding data!')
                    window.location.href = 'index.php?page=data-project'
                </script>";
    }
    mysqli_close($connect);
}

function editData()
{
    global $connect;
    global $getid;

    $query = "UPDATE projects SET project_name = '$_POST[project_name]', 
                                    client_name = '$_POST[client_name]', 
                                    start_date = '$_POST[start_date]', 
                                    end_date = '$_POST[end_date]',
                                    progress = '$_POST[progress]',
                                    leader_id = '$_POST[leader_id]'
                                    WHERE id_project = '$getid'";
    if (mysqli_query($connect, $query)) {
        echo "
                <script>
                    alert('Success edit data!')
                    window.location.href = 'index.php?page=data-project'
                </script>";
    } else {
        echo "
                <script>
                    alert('cant edit data!')
                    window.location.href = 'index.php?page=data-project'
                </script>";
    }
    mysqli_close($connect);
}

function deleteData()
{
    global $connect;
    $getidd = $_GET['id'];
    $query = "DELETE FROM projects WHERE id_project = '$getidd' ";
    if (mysqli_query($connect, $query)) {
        echo "
            <script>
                alert('Succes delete data!')
                window.location.href = 'index.php?page=data-project'
            </script>";
    } else {
        echo "
            <script>
                alert('Cant delete data!')
                window.location.href = 'index.php?page=data-project'
            </script>";
    }
    mysqli_close($connect);
}