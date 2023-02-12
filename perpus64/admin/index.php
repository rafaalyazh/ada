<?php

include_once('../class/User.php');
include_once('../class/Buku.php');
include_once('../class/Peminjaman.php');
include_once("../class/Pemberitahuan.php");

$user = new User;
$data_user = $user->find(1);

$anggota = new User;
$data_anggota = $anggota->getAnggota();

$buku = new Buku;
$data_buku = $buku->all();

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->getPeminjaman();

$pengembalian = new Peminjaman;
$data_pengembalian = $pengembalian->getPengembalian();

$pemberitahuan = new Pemberitahuan;
$data_pemberitahuan = $pemberitahuan->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
<?php 
include_once('sidebar.php'); ?>
<div class="pemberitahuan">
      <?php
        
        foreach($data_pemberitahuan as $pemberitahuan){
          ?>
            <div class="alert alert-info">
              <?= $pemberitahuan["isi"] ?>
            </div>
            <?php
        }
      ?>
   <br>
    <table border="1">
      <tr>
        <th>Data Anggota</th>
        <th>Data Buku</th>
        <th>Data Peminjaman</th>
        <th>Data Pengembalian</th>
      </tr>
      <tr>
          <td><?= count($data_anggota) ?></td>
          <td><?= count($data_buku) ?></td>
          <td><?= count($data_peminjaman) ?></td>
          <td><?= count($data_pengembalian) ?></td>
      </tr>
    </table>
    </div>
  </body>
</html>