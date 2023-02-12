<?php
include_once('../../../class/Buku.php');
include_once('../../../class/Kategori.php');
include_once('../../../class/Penerbit.php');

$buku = new Buku;
$data_buku = $buku->find($_GET["id"]);

$kategori = new Kategori;
$data_kategori = $kategori->all();

$penerbit = new Penerbit;
$data_penerbit = $penerbit->all();

if(isset($_POST["update"])){
    $data= [
        "judul" => $_POST["judul"],
        "kategori_id" =>$_POST["kategori_id"],
        "penerbit_id" =>$_POST["penerbit_id"],
        "pengarang" =>$_POST["pengarang"],
        "tahun_terbit" =>$_POST["tahun_terbit"],
        "isbn" =>$_POST["isbn"],
        "j_buku_baik" =>$_POST["j_buku_baik"],
        "j_buku_rusak" =>$_POST["j_buku_rusak"],

    ];
        
    $buku->update($_POST['id_buku'],$data);
    echo "Update Berhasil";
    header('location:index.php');
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Buku</title>
</head>
<body>

<div class="profil">
        <form action="" method="POST" enctype="multipart/form-data">
            <table border="1">
                <input type="hidden" name="id_buku" value="<?= $data_buku["id"] ?>">
                <tr>
                    <th>Judul Buku</th>
                    <td>
                        <input type="text" name="judul" value="<?= $data_buku["judul"] ?>">
                    </td>
                </tr>
                <td>Kategori</td>
                <td>
                
                    <select name="kategori_id" id="">
    
                    <?php
                        foreach($data_kategori as $k){
                            ?>
                            <option value="<?= $k["id"] ?>" <?php if(isset($_GET["kategori_id"]) ){ if($_GET["kategori_id"] == $k["id"]) {echo "selected"; } else { echo "";}} else { echo ""; } ?>><?= $k["kode"] ?> | <?= $k["nama"] ?></option>
                            <?php
                    }
                ?>
                    </select>
                </td>
                <tr>
                <td>Nama Penerbit</td>
                <td>
               
                  <select name="penerbit_id"  id="">
                <?php
                        foreach($data_penerbit as $p){
                            ?>
                            <option value="<?= $p["id"] ?>" <?php if(isset($_GET["penerbit_id"]) ){ if($_GET["penerbit_id"] == $p["id"]) {echo "selected"; } else { echo "";}} else { echo ""; } ?>><?= $p["kode"] ?> | <?= $p["nama"] ?> </option>
                            <?php
                    }
                ?>
                </select>
                </td>
            </tr>
                <tr>
                    <th>Nama Pengarang</th>
                    <td>
                        <input type="text" name="pengarang" value="<?= $data_buku["pengarang"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>
                        <input type="text" name="tahun_terbit" value="<?= $data_buku["tahun_terbit"] ?>">
                    </td>
                </tr>
            <tr>
                <td>ISBN</td>
                <td><input type="text" name="isbn" value="<?= $data_buku["isbn"] ?>"></td>
            </tr>
            <tr>
                <td>Buku Baik</td>
                <td><input type="text" name="j_buku_baik" value="<?= $data_buku["j_buku_baik"] ?>"><td>
            </tr>
            <tr>
                <td>Buku Rusak</td>
                <td><input type="text" name="j_buku_rusak" value="<?= $data_buku["j_buku_rusak"] ?>"></td>
            </tr>
        </table>
            <button type="submit" name="submit">SUBMIT</button>
</form>
</div>
</body>
</html>