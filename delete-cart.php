<?php
    session_start();
    include('connection.php');

    $username = $_GET['username'];

    $query = "UPDATE tb_keranjang SET keranjang = '' WHERE username = '$username'";

    mysqli_query($connect, $query);
    header("Location: userCart.php");
    exit();
?>
