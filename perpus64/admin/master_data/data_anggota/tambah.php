<?php
include_once('../../../class/User.php');

if(isset($_POST["submit"])){
    $data= [
        "kode" => $_POST["kode"],
        "nis" => $_POST["nis"],
        "fullname"=> $_POST["fullname"],
        "username"=> $_POST["username"],
        "password"=> password_hash($_POST["password"],PASSWORD_DEFAULT),
        "kelas"=> $_POST["kelas"],
        "alamat"=> $_POST["alamat"],
        "verif"=> $_POST["verif"],
        "role"=> $_POST["role"],
        "join_date"=> $_POST["join_date"],
        "foto"=> $_POST["foto"],
    ];
        
    $user = new User;
    $submit= $user->create($data);
    echo $submit;
    header("Location: index.php?>pesan=tambah_sukses");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Anggota</title>
</head>
<body>

    <div class= "form_tambah_administrasi">
        <form method="POST" action="">
            <h3>Form Tambah Anggota</h3>
        <table>
            <tr>
                <td>Kode</td>
                <td><input type="text" name="kode"></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td><input type="text" name="nis"></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="fullname"><td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</label>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" name="kelas"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat"></textarea></td>
            </tr>
            <tr>
                <td>Verifikasi</td>
                <td><input type="text" name="verif" value="VERIFIED"><td>
            </tr>
            <tr>
                <td>Role</td>
                <td><select name="role" id="">
                <option value="" disabled selected>-- Pilih Opsi--</option>
                <option values="user">User</option></select></td>
            </tr>
            <tr>
                <td>Join Date</td>
                <td><input type="date" name="join_date"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
        </table>
            <button type="submit" name="submit">SUBMIT</button>
</form>
</div>
</body>
</html>