<?php
include_once('../../../class/User.php');

$id= $_GET["id"];

$user= new User;
$data_user=$user->delete($id);

header("Location: index.php?pesan=hapus_sukses");
?>