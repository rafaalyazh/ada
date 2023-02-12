<?php
include_once('../../../class/User.php');

$id= $_GET["id"];

$administrator= new User;
$data_administrator=$administrator->delete($id);

header("Location: index.php?pesan=hapus_sukses");
?>