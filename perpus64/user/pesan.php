<?php
include_once("../class/Pesan.php");

$pesan = new Pesan;
$data_pesan = $pesan->findByUserId(4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
</head>
<body>

    <?php include('../sidebar.php') ?>
                                                  
<div class="pesan">
      <h3>Pesan</h3>
    
      <table border="2">     
      <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
      <?php
        foreach($data_pesan as $key => $pesan){
            ?>
            <tr>
               <td><?= $key+1 ?></td>
               <td><?= $pesan["isi"] ?></td> 
               <td><?= $pesan["status"] ?></td>
               <td><a href="baca.php?id=<?= $pesan["id"] ?>">Lihat</a></td>
           </tr>
           <?php
          }
          ?>
       </table>
     </div>
</body>
</html>                                                            