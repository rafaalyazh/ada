<?php
include_once('../../../class/User.php');

$user = new User;
$data_user = $user->find(1);

$anggota = new User;
$data_anggota = $anggota->getAnggota();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <?php include('../../sidebar.php'); ?>

    <div class="data_anggota">
        <h3>Data Anggota</h3>

            <?php
                if(isset($_GET["pesan"])){
                    if($_GET["pesan"]== "hapus_sukses"){
                        echo "Berhasil menghapus user";
                    }
                    if($_GET["pesan"]== "hapus_gagal"){
                        echo "Gagal menghapus user";
                    }
                    if($_GET["pesan"]== "tambah_sukses"){
                        echo "Berhasil menambah user";
                    }
                    if($_GET["pesan"]== "edit_sukses"){
                        echo "Berhasil mengedit user";
                    }
                }
            ?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <?php include_once("../../sidebar.php"); ?>
                        </div>

                        <div class="col-md-9 col-sm-12">
                            <a href="tambah.php">Tambah</a>
                                <table border="1">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nis</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Alamat</th>
                                        <th>Verifikasi</th>
                                        <th>Aksi</th>
                                    </tr>
                        </div>
                    </div>
                </div>


        <?php 
        foreach($data_anggota as $key=> $a){
            ?>
            <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $a["kode"]?></td>
                        <td><?= $a["nis"]?></td>
                        <td><?= $a["fullname"]?></td>
                        <td><?= $a["kelas"]?></td>
                        <td><?= $a["alamat"]?></td>
                        <td><?= $a["verif"]?></td>
                        <td>
                            <a href="edit.php?id=<?= $a['id']?>">Edit</a>
                            <a onclick="hapus(<?= $a['id']?>)" href="#">Hapus</a>
                        </td>
                    </tr>
                <?php
            }
        ?>
        </table>
    </div>
     <script>
        function hapus(id){
            let konfirmasi = confirm("Apakah anda yakin ingin menghapus user ini?");

            if(konfirmasi === true){
                window.location.href ="hapus.php?id=" + id;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>