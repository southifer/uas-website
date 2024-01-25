<?php
    include "connection.php";
    
    $id = $_GET['id'];
    $query = "DELETE FROM tb_game WHERE id_game = '$id'";
    mysqli_query($connect, $query);

    header('location: admin-panel.php');
?>