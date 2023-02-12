<?php
include_once('../../../class/User.php');
include_once('../../../class/Peminjaman.php');

$user = new User;
$data_user = $user->find(1);

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
</head>
<body>
    <?php include('../../sidebar.php'); ?>

    <div class="data_peminjaman">
        <h3>Data Peminjaman</h3>

        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Kondisi Buku Saat Dipinjam</th>
                <th>Kondisi Buku Saat Dikembalikan</th>
                <th>Denda</th>
            </tr>
        <?php 
             foreach($data_peminjaman as $key=> $pinjam){
        ?>
            <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $pinjam["peminjam"]?></td>
                        <td><?= $pinjam["buku"]?></td>
                        <td><?= $pinjam["tanggal_peminjaman"]?></td>
                        <td><?= $pinjam["tanggal_pengembalian"]?></td>
                        <td><?= $pinjam["kondisi_buku_saat_dipinjam"]?></td>
                        <td><?= $pinjam["kondisi_buku_saat_dikembalikan"]?></td>
                        <td><?= $pinjam["denda"]?></td>    
            </tr>
                <?php
            }
        ?>
        </table>
    </div>
</body>
</html>