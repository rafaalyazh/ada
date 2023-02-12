<?php
include_once('../class/Buku.php');
include_once('../class/Peminjaman.php');
include_once('../class/User.php');


$user = new User;
$data_user = $user->find(4);

$buku = new Buku;
$data_buku = $buku->all();


if (isset($_POST["submit"])){
    $data = [
        "id_user" => $_POST["id_user"],
        "id_buku" => $_POST["id_buku"],
        "tanggal_peminjaman" =>$_POST["tanggal_peminjaman"],
        "kondisi_buku_saat_dipinjam" =>$_POST["kondisi_buku_saat_dipinjam"],

    ];

    $peminjaman = new Peminjaman;
    $submit = $peminjaman->create($data);

    header("Location: peminjaman.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
</head>
<body>

    <?php include('../sidebar.php');?>

    <div class="form_peminjaman">
        <h3>Form Peminjaman</h3>

        <form method="POST" action="">
        <div>
            <label>Nama Peminjam</label>
            <input type="text" disabled value="<?= $data_user["fullname"]?>">
            <input type="hidden" name="id_user" value="<?= $data_user["id"]?>">
        </div>
        <div>
            <label>Judul Buku</label>
            <select name="id_buku">
                <option value="" disabled selected>.. PILIH OPSI ..</option>
                <?php
                    foreach($data_buku as $b){
                        ?>
                        <option value="<?= $b["id"] ?>" <?php if(isset($_GET["id_buku"]) ){ if($_GET["id_buku"] == $b["id"]) {echo "selected"; } else { echo "";}} else { echo ""; } ?>><?= $b["judul"] ?> | <?= $b["pengarang"] ?></option>
                        <?php
                }
            ?>
            </select>
        </div>
        <div>
            <label>Tanggal Peminjaman</label>
            <input type="date" name= "tanggal_peminjaman" value="<?= date('Y-m-d') ?>">
        </div>
        <div>
            <label>Kondisi Saat Dipinjam</label>
                <select name="kondisi_buku_saat_dipinjam">
                    <option value="" disabled selected>.. PILIH OPSI ..</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>
        </div>
        
        <button type="submit" name="submit">SUBMIT</button>

        </form>
    </div>
</body>
</html>