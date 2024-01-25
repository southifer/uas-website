<?php
include "connection.php";

$id_game = $_GET['id'];
$username = $_GET['user'];

$query1 = "SELECT * FROM tb_game WHERE id_game = '$id_game'";
$data = mysqli_query($connect, $query1);
$row = mysqli_fetch_assoc($data);

$namaGame = $row['title'];

// Retrieve existing keranjang data for the user
$getKeranjangQuery = "SELECT * FROM tb_keranjang WHERE username = '$username'";
$getKeranjangResult = mysqli_query($connect, $getKeranjangQuery);

if ($getKeranjangResult) {
    $existingKeranjang = mysqli_fetch_assoc($getKeranjangResult);
    if ($existingKeranjang) {
        // Decode the existing JSON data
        $existingKeranjangData = json_decode($existingKeranjang['keranjang'], true);

        // Add the new game to the existing data
        $existingKeranjangData['games'][] = array(
            'game_title' => $namaGame,
        );

        // Encode the updated data as JSON
        $encodedKeranjang = json_encode($existingKeranjangData);

        // Update the existing row
        $updateQuery = "UPDATE tb_keranjang SET keranjang = '$encodedKeranjang' WHERE username = '$username'";
        mysqli_query($connect, $updateQuery);
    } else {
        // If no existing row, insert a new row with the new game
        $keranjangData = array(
            'games' => array(
                array(
                    'game_title' => $namaGame,
                )
            ),
        );
        $encodedKeranjang = json_encode($keranjangData);

        $insertQuery = "INSERT INTO tb_keranjang (username, keranjang) VALUES ('$username', '$encodedKeranjang')";
        mysqli_query($connect, $insertQuery);
    }

    header('location: dashboard.php?message=wishInputSuccess');
} else {
    // Handle query error
    echo "Error: " . mysqli_error($connect);
}
?>
