<?php
include_once('../class/Identitas.php');
include_once('../class/User.php');

$identitas = new Identitas;
$data_identitas = $identitas->all();


$user = new User;
$data_user= $user->find(1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identitas Aplikasi</title>
</head>
<body>

    <?php include('sidebar.php') ?>
                                                  
<div class="identitas">
      <h3> Identitas Perpustakaan</h3>
    
      <table border="2">     
      <tr>
        <th>No.</th>
        <th>Nama Perpustakaan</th>
        <th>Alamat Perpustakaan</th>
        <th>Email Perpustakaan</th>
        <th>Nomor HP</th>
        <th>Foto</th>
      </tr>
      <?php
        foreach($data_identitas as $key => $i){
            ?>
            <tr>
               <td><?= $key+1 ?></td>
               <td><?= $i["nama_app"] ?></td> 
               <td><?= $i["alamat_app"] ?></td>
               <td><?= $i["email_app"] ?></td>
               <td><?= $i["nomor_hp"] ?></td>
               <td><?= $i["foto"] ?></td>
           </tr>
           <?php
          }
          ?>
       </table>
     </div>
</body>
</html>                                                            