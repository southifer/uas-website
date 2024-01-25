<?php
    include "connection.php";

    $banner = $_POST['banner'];
    $cover = $_POST['cover'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $boolean = $_POST['current_free'];

    $query = "INSERT INTO tb_game (banner, cover, title, description, price, current_free)
                VALUES ('$banner','$cover','$title','$description','$price','$current_free')";
    mysqli_query($connect, $query);
    header('location: admin-game-panel.php')
?>