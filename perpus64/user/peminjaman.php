<?php
include_once('../class/Peminjaman.php');
include_once('../class/User.php');

$user = new User;
$data_user = $user->find(4);

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
</head>
<body>


  <?php include('../sidebar.php') ?>
                                                  
<div class="peminjaman">
      <h3>Buku Yang Dipinjam</h3>
      <a href="form_peminjaman.php">Tambah</a>
      <table border="1">     
      <tr>
        <th>No.</th>
        <th>Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Kondisi di pinjam</th>
        <th>Aksi</th>
      </tr>
      <?php
        foreach($data_peminjaman as $key => $p){
            ?>
            <tr>
               <td><?= $key+1 ?></td>
               <td><?= $p["buku"] ?></td>
               <td><?= $p["tanggal_peminjaman"] ?></td>
               <td><?= $p["kondisi_buku_saat_dipinjam"] ?></td>
               <td>
                   <a href="form_peminjaman.php">Pinjam</a>
                   <a href="pengembalian.php">Kembalikan</a>
               </td>
           </tr>
           <?php
          }
          ?>
       </table>
     </div>
</body>
</html>                                                            