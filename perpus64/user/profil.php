<?php
include_once('../class/User.php');

$user = new User;
$data_user = $user->find(4);

if(isset($_POST["submit"])){
    $data =[
        "id"       => $_POST["id"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => password_hash( $_POST["password"], PASSWORD_DEFAULT),
        "kelas"    => $_POST["kelas"],
        "alamat"   => $_POST["alamat"],
    ];

    $simpan = $user->update($_POST["id"],$data);
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <?php include('../sidebar.php')?>

    <div class="profil">
        <form method="POST" action=""enctype="multipart/form-data">
            <table border="1">
                <!-- <input type="hidden" name="id" value="<?= $data_user["id"]?>"> -->
                
                <tr>
                    <th>ID User</th>
                    <td>
                        <input type="text" name="id" value="<?= $data_user["id"] ?>">
                    </td>
                </tr>

                <tr>
                    <th>Kode</th>
                    <td>
                        <input type="text" name="kode" value="<?= $data_user["kode"] ?>">
                    </td>
                </tr>

                <tr>
                    <th>Nis</th>
                    <td>
                        <input type="text" name="nis" value="<?= $data_user["nis"] ?>">
                    </td>
                </tr>
                
                <tr>
                    <th>Nama Lengkap</th>
                    <td>
                        <input type="text" name="fullname" value="<?= $data_user["fullname"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>
                        <input type="text" name="username" value="<?= $data_user["username"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <input type="Password" name="password" value="" placeholder="Password belum diubah">
                    </td>
                </tr>
                <tr>
                    <th>kelas</th>
                    <td>
                        <input type="text" name="kelas" value="<?= $data_user["kelas"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>
                        <input type="text" name="alamat" value="<?= $data_user["alamat"] ?>">
                    </td>
                </tr>

                <tr>
                    <th>Foto</th>
                    <td>
                        <input type="file" name="foto">
                    </td>
                </tr>
            </table>
            <button type=submit>Submit  </button>
        </form>
    </div>
    
</body>
</html>