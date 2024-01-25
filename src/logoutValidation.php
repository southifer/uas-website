<?php

    session_start();
    session_unset();
    session_destroy();

    setcookie('id_user', '', 0, '/');
    header('location: index.php');
?>