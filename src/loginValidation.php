<?php
    session_start();
    include "connection.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
    $data = mysqli_query($connect, $query);

    $row = mysqli_fetch_assoc($data);

    $count = mysqli_num_rows($data);

    if ($count == 0) {
        header("location: index.php?message=notfound");
    } else {
        $_SESSION = array(
            'id_user'   => $row['id_user'],
            'username'  => $row['username'],
            'level'     => $row['level']
        );

        // Create Cookies
        $expired = time() + 60 * 60;
        setcookie('id_user', $row['id_user'], $expired, '/'); // Corrected cookie value

        header('location: dashboard.php?message=success');
    }
?>
