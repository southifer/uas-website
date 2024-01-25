<?php
    include "connection.php";

    $id = $_POST['id'];
    $banner = $_POST['banner'];
    $cover = $_POST['cover'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_free = $_POST['current_free'];

    $query = "UPDATE tb_game SET banner = '$banner', cover = '$cover', title = '$title', description = '$description', price = '$price', current_free = '$current_free' WHERE id_game = '$id'";
    mysqli_query($connect, $query);
    header('location: admin-game-panel.php');
?>