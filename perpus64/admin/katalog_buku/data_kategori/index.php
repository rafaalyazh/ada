<?php
include_once('../../../class/Kategori.php');
include_once('../../../class/User.php');

$user = new User;
$data_user = $user->find(1);

$kategori = new Kategori;
$data_kategori = $kategori->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
</head>
<body>
    <?php include('../../sidebar.php'); ?>

    <div class="data_kategori">
        <h3>Data Kategori</h3>

            <?php
                if(isset($_GET["pesan"])){
                    if($_GET["pesan"]== "hapus_sukses"){
                        echo "Berhasil menghapus kategori";
                    }
                    if($_GET["pesan"]== "hapus_gagal"){
                        echo "Gagal menghapus kategori";
                    }
                    if($_GET["pesan"]== "tambah_sukses"){
                        echo "Berhasil menambah kategori";
                    }
                    if($_GET["pesan"]== "edit_sukses"){
                        echo "Berhasil mengedit kategori";
                    }
                }
            ?>

        <a href="tambah.php">Tambah</a>

        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        <?php 
        foreach($data_kategori as $key=> $k){
            ?>
            <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $k["nama"]?></td>
                        <td>
                            <a href="edit.php">Edit</a>
                            <a onclick="hapus(<?= $a["id"]?>)" href="#">Hapus</a>
                        </td>
                    </tr>
                <?php
            }
        ?>
        </table>
    </div>
     <script>
        function hapus(id){
            let konfirmasi = confirm("Apakah anda yakin ingin menghapus kategori ini?");

            if(konfirmasi === true){
                window.location.href ="hapus.php?id=" + id;
            }
        }
    </script>
</body>
</html>