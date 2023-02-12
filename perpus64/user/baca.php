<?php

include_once('../class/Pesan.php');
include_once('../class/Database.php');

$pesan = new Pesan;
$data_pesan = $pesan ->findByUserId (4);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Pesan</title>
</head>
<body>
    <?php include('../sidebar.php') ?>
    
    <div class="baca_pesan">
        <h3>Pesan</h3>
        <a href="pesan.php">Kembali</a>

        <table border="1">
        <tr>
            <th>Judul pesan</th>
            <th>Isi pesan</th>
        </tr>
            <?php foreach ($data_pesan as $key => $ps) {
                ?>
        <tr>
            <td><?= $ps["judul"] ?></td>
            <td><?= $ps["isi"] ?></td>
        </tr>
        <?php
            }
        ?>
        </table>
    </div>
</body>
</html>