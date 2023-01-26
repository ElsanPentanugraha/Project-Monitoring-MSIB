<?php
include 'connection.php';

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $dataLogin = mysqli_query($connect, 'SELECT * FROM users');
    $cekdata = mysqli_num_rows($dataLogin);
    $listdata = mysqli_fetch_assoc($dataLogin);

    if ($cekdata > 0) {
        if (
            $listdata['name'] == $username &&
            $listdata['password'] == $password
        ) {
            // buat session login dan username
            $_SESSION['username'] = $username;
            echo "
                <script>
                    alert('Login Berhasil')
                    window.location.href = '../index.php'
                </script>";
        }
    }

    if ($listdata['name'] != $username && $listdata['password'] == $password) {
        echo "
                <script>
                    alert('Username yang anda masukkan salah. Silahkan coba lagi!')
                    window.location.href = '../login.php?msg=incorrect'
                </script>";
    } elseif (
        $listdata['name'] == $username &&
        $listdata['password'] != $password
    ) {
        echo "
                <script>
                    alert('Password yang anda masukkan salah. Silahkan coba lagi!')
                    window.location.href = '../login.php?msg=incorrect'
                </script>";
    } else {
        echo "
                <script>
                    alert('Username atau password Anda salah. Silahkan coba lagi!')
					// window.location.href = '../login.php?msg=incorrect'
                </script>";
    }
}
?>