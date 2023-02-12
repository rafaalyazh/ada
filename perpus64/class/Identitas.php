<?php

include_once("Database.php");

class Identitas{
    public function all(){
        $sql = "SELECT * FROM identitas";
        $db = new Database;
        return $db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM identitas WHERE id='$id'";

        $db = new Database;
        return $db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
    $nama_app = $data["nama_app"];
    $alamat_app = $data["alamat_app"];
    $email_app = $data["email_app"];
    $nomor_hp = $data["nomor_hp"];
    $foto =$data["foto"];

        $sql = "INSERT INTO identitas ( nama_app, alamat_app, email_app, nomor_hp, foto) VALUES ('$nama_app','$alamat_app','$email_app','$nomor_hp','$foto')";

        $db = new Database;
        if($db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil Menambah data peminjaman";
        }
            return "Gagal Menambah data peminjaman";
        
    }

    public function update($id,$data){
    $nama_app = $data["nama_app"];
    $alamat_app = $data["alamat_app"];
    $email_app = $data["email_app"];
    $nomor_hp = $data["nomor_hp"];
    $foto =$data["foto"];
    
            $sql = "UPDATE identitas SET nama_app= '$nama_app', alamat_app= '$alamat_app', email_app= '$email_app', nomor_hp = '$nomor_hp' , foto = '$foto' WHERE id = '$id'";
    
            $db = new Database;
            if($db->connect()->query($sql)=== TRUE)
            {
                return "Berhasil Merubah Data";
            }
                return "Gagal Merubah Data";
            
        }

        public function delete($id){
        
                $sql = "DELETE FROM identitas WHERE id='$id'";
        
                $db = new Database;
                if($db->connect()->query($sql)=== TRUE)
                {
                    return "Berhasil Hapus Data";
                }
                    return "Gagal Hapus Data";
                
            }

}

?>

