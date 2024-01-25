<?php
    include "connection.php";
    session_start();
    checkSession();
    checkCookies();
    adminLevel();
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Panel</title>

        <!-- Data Tables API Javascript-->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
        <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
         * {
                font-family: Montserrat;
        }
    </style>
    </head>
    <body>
        <?php
            include "navbar.php";
        ?>
        <div class="container">
            <br>
            <h3 class="text-center">Edit Panel</h3>
            <br><br>
            <?php
                $id = $_GET['id'];
                $query = "SELECT * FROM tb_game WHERE id_game = '$id'";
                $data = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($data);
            ?>
            <form method="post" action="form-edit-process.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Game Banner</label>
                    <textarea class="form-control" id="banner" name="banner" rows="3"><?= $row['banner'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Game Cover</label>
                    <textarea class="form-control" id="cover" name="cover" rows="3"><?= $row['cover'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Game Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $row['title'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Game Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= $row['description'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Game Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?= $row['price'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Game is free?</label>
                    <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="current_free" name="current_free">
                        <option selected>Open this select menu</option>
                        <option value="1" <?= $row['current_free'] == "1" ? "selected" : "" ?>>No</option>
                        <option value="0" <?= $row['current_free'] == "0" ? "selected" : "" ?>>Yes</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?= $id?>">
                <button type="submit" class="btn btn-primary">Submit Edited Data</button>
            </form>
            </div>
        </div>
        <br><br>
        <script>
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>