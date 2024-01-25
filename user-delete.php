<?php
    include "connection.php";
    
    $id = $_GET['id'];
    $query = "DELETE FROM tb_user WHERE id_user = '$id'";
    mysqli_query($connect, $query);

    header('location: admin-panel.php');
?>