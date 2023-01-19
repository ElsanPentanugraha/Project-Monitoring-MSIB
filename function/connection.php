<?php
//konfigurasi koneksi database
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'msib';

//create connection to database
$connect = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

//checking connection
if (!$connect) {
    die('Connection Failed: ' . mysqli_connect_error());
}