<?php

include_once("../class/Pemberitahuan.php");
include_once("../class/Buku.php");

$pemberitahuan = new pemberitahuan;
$data_pemberitahuan = $pemberitahuan->all();

$buku = new Buku;
$data_buku = $buku->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <?php include_once('../sidebar.php'); ?>

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
    </div>

    <div class="sidebar">
      <table border="2">
      <tr>
        <th>No.</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Aksi</th>
      </tr>
      <?php
        foreach($data_buku as $key => $buku){
            ?>
            <tr>
               <td><?= $key+1 ?></td>
               <td><?= $buku["judul"] ?></td>
               <td><?= $buku["pengarang"] ?></td>
               <td><?= $buku["nama_penerbit"] ?></td>
               <td><a href="form_peminjaman.php?id_buku  ?>">Pinjam</a></td>
           </tr>
           <?php
          }
          ?>
       </table>
     </div>
     </body>
  </html>