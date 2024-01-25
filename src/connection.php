<?php
    $connect = mysqli_connect("localhost", "root", "", "uas");

    if(mysqli_connect_errno()) {
        echo "Failed to connect database... -> " . mysqli_connect_error();
    }
    function checkSession() {
        if (!isset($_SESSION['id_user'])) {
            header('location: index.php?pesan=login');
        }
    }
    function checkCookies() {
        if (!isset($_COOKIE['id_user'])) {
            header('location: index.php?pesan=login');
        }
    }
    function adminLevel() {
        // if ($_SESSION['level'] != 0) {
        //     header('location: dashboard.php?');
        // }
    }
?>
