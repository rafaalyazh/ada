<?php
include_once('../../../class/Buku.php');
include_once('../../../class/Kategori.php');
include_once('../../../class/Penerbit.php');

$kategori = new Kategori;
$data_kategori = $kategori->all();

$penerbit = new Penerbit;
$data_penerbit = $penerbit->all();

if(isset($_POST["submit"])){
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
        
    $buku = new Buku;
    $data_buku= $buku->create($data);
    header("Location: index.php?>pesan=tambah_sukses");

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Buku</title>
</head>
<body>

    <div class= "form_tambah_buku">
        <form method="POST" action="">
            <h3>Form Tambah Buku</h3>
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>Nama Pengarang</td>
                <td><input type="text" name="pengarang"><td>
            </tr>
            <tr>
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
            </tr>
            <tr>
                <td>Nama Penerbit</td>
                <td><select name="penerbit_id"  id="">
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
                <td>Buku Baik</td>
                <td><input type="text" name="j_buku_baik"><td>
            </tr>
            <tr>
                <td>Buku Rusak</td>
                <td><input type="text" name="j_buku_rusak"></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="tahun_terbit"></td>
            </tr>
            <tr>
                <td>ISBN</td>
                <td><input type="text" name="isbn"></td>
            </tr>
        </table>
            <button type="submit" name="submit">SUBMIT</button>
</form>
</div>
</body>
</html>