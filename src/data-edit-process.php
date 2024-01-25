<?php
    include "connection.php";

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = "UPDATE tb_user SET username = '$username', password = '$password', level = '$level' WHERE id_user = '$id'";
    mysqli_query($connect, $query);
    header('location: admin-panel.php');
?>