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
            <h3 class="text-center">Game Panel Management</h3>
            <a href="form-add.php" class="btn btn-outline-light">Tambah Data</a>
            <br><br>
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin-panel.php">User credentials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin-game-panel.php">Game Panel</a>
                    </li>
                </ul>
                <br>
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Banner</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Is free</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $index = 1;
                            $query = "SELECT * FROM tb_game";
                            $data = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_assoc($data)) { ?>
                                <tr>
                                    <td><?= $index++ ?></td>
                                    <td>
                                        <?php if ($row['banner'] != NULL || $row['banner'] != '') { ?>
                                            <img src="<?= $row['banner'] ?>" class="img-thumbnail" alt="...">
                                        <?php } else { ?>
                                            
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($row['cover'] != NULL || $row['cover'] != '') { ?>
                                            <img src="<?= $row['cover'] ?>" class="img-thumbnail" alt="...">
                                        <?php } else { ?>
                                            
                                        <?php } ?>
                                    </td>
                                    <td><?= $row['title'] ?></td>
                                    <td class="d-inline-block text-truncate" style="max-width: 300px; height: auto;">
                                        <?= $row['description'] ?>
                                    </td>
                                    <td><?= number_format($row['price']) ?></td>
                                    <td>
                                        <?php 
                                        switch ($row['current_free']) {
                                            case 1:
                                                ?>Paid<?php
                                                break;
                                            case 0:
                                                ?>Free<?php
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                               Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="data-delete.php?id=<?= $row['id_game']?>">Delete</a></li>
                                                <li><a class="dropdown-item" href="data-edit.php?id=<?= $row['id_game']?>">Update</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php ?>
                    </tbody>
                </table>
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