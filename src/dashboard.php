<?php
    include "connection.php";
    session_start();
    checkSession();
    checkCookies();
    adminLevel();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
            * {
                font-family: Montserrat;
            }
        #nav-thumb {
            filter: invert(100%);
        }
        .card-body {
            font-weight: bold;
        }
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            opacity: 0.7;
        }
        #myImg:hover {opacity: 0.9;}
        .col {
            cursor: pointer;
            transition: 0.3s;
        }
        .col:hover {
            opacity: 0.7;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <br>
    <?php
        if (isset($_GET['message'])) {
            if ($_GET['message'] == 'success') {
                echo "<script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: 'question',
                            title: 'Selamat datang, " . $_SESSION['username'] . "'
                        });
                    </script>";
            }
            if ($_GET['message'] == 'wishInputSuccess') {
                echo "<script>
                    Swal.fire({
                        title: 'Added to cart!',
                        icon: 'info',
                        timer: 1500
                    });
                    </script>";
            }
        }
    ?>

    <div class="container" style="width: 80%;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="userCart.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 21 21">
                                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                            </svg>
                            My Cart
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#freeGames">
                            <div class="d-flex" style="height: 30px;">
                                <div class="vr"></div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#mostPopular">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-star" viewBox="0 0 21 21">
                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                            </svg>
                            Popular
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#freeGames">
                            <div class="d-flex" style="height: 30px;">
                                <div class="vr"></div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#freeGames">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-gift" viewBox="0 0 21 21">
                                <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zM1 4v2h6V4zm8 0v2h6V4zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5z"/>
                            </svg>
                            Free Games
                        </a>
                    </li>
                </ul>
            </div>

            <?php
                if ($_SESSION['level'] == 1) { ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="admin-panel.php" class="btn btn-outline-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                            <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                        </svg>
                    </a>
                </div>

            <?php } ?>

        </nav>
    </div>
    <br>
    <div class="container text-center" style="width: 80%; padding-bottom: 100px;">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="border-radius: 15px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <?php
                    $index = 0;
                    $query = "SELECT * FROM tb_game";
                    $data = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($data)) { 
                    if ($row['banner'] != NULL) { $index++;?>
                        <div class="
                            <?php 
                                if($index == 1) { 
                                    echo "carousel-item active"; 
                                } else {
                                    echo "carousel-item"; 
                                }
                            ?>
                            "
                            data-bs-interval="
                            <?php 
                                echo (20000 / $index); 
                            ?>
                            ">
                            <img id="myImg" src="<?= $row['banner']; ?>" class="d-block w-100" alt="..." style="max-height: 630px; width: auto;">
                        </div>
                <?php } } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>

        <p class="text-start">
            <b>Most Popular</b>
        </p>
        <div class="row align-items-start" id="mostPopular">
            <?php
                $query = "SELECT * FROM tb_game";
                $data = mysqli_query($connect, $query);
                
                while ($row = mysqli_fetch_assoc($data)) {

                    // Check if there is a row
                    if ($row['cover'] != '' || $row['cover'] != NULL ) {
                        ?>
                        <div class="col" style="padding-bottom: 25px;">
                            <a onclick="confirmAdd('<?= $row['id_game'] ?>')" href="javascript:void(0);">
                                <div class="card" style="width: 15rem; border: none;">
                                    <img src="<?= $row['cover'] ?>" class="card-img-top" alt="..." style="max-height: 270px; width: 100%;">
                                    <h6 class="text-start" style="padding-top: 10px; font-size: 0.6rem; color: #9b9b9b;"><b>BASE GAME</b></h6>
                                    <p class="text-start"><?= $row['title'] ?></p>
                                    <?php if ($row['price'] == 0) { ?>
                                        <p class="text-start">Free</p>
                                    <?php } else { ?>
                                        <p class="text-start">IDR <?= number_format($row['price']) ?></p>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
        <br>

        
        <div style="background-color: #2A2A2A; padding: 50px; border-radius: 10px; display:flexbox; align-items: center;">
            <p class="text-start" style="padding-bottom: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gift" viewBox="0 0 16 16">
                    <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zM1 4v2h6V4zm8 0v2h6V4zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5z"/>
                </svg>
                Free Games
            </p>
            <div class="row align-items-center" id="freeGames" style="transform: scale(1.03);">
                <?php
                    $query = "SELECT * FROM tb_game";
                    $data = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_assoc($data)) { 
                        if ($row['banner'] != '' && $row['current_free'] == '0') { ?>
                            <div class="col">
                                <div class="card" style="width: auto; border: none; background-color: #2A2A2A;">
                                    <img src="<?= $row['banner'] ?>" class="card-img-top" alt="..." style="max-height: 250px; width: 100%;">
                                    <h6 class="text-start" style="padding-top: 20px; font-size: 1rem; color: white;">
                                        <?= $row['title']?>
                                    </h6>
                                    <h6 class="text-start" style="font-size: 0.8rem; color: #9b9b9b;">
                                        <b>Currently Free</b>
                                    </h6>
                                </div>
                            </div>
                <?php } } ?>

            </div>
        </div>
    </div>
    <script>
        function confirmAdd(id) {
            Swal.fire({
                title: "Are you sure?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, add to cart!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'tambah_keranjang.php?id=' + id +'&user=<?= $_SESSION['username'] ?>';
                }
            });
        }
        const scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#navbar-example'
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
