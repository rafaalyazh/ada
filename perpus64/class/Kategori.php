<?php

include_once("Database.php");

class Kategori{
    public function all(){
        $sql = "SELECT * FROM kategori";
        $db = new Database;
        return $db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM kategori WHERE id='$id'";

        $db = new Database;
        return $db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
    $kode = $data["kode"];
    $nama = $data["nama"];

        $sql = "INSERT INTO kategori (kode, nama) VALUES ('$kode',' $nama')";

        $db = new Database;
        if($db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menambah data peminjaman";
        }
            return "Gagal menambah data peminjaman";
        
    }

    public function update($data){
        $kode = $data["kode"];
        $nama = $data["nama"];
    
            $sql = "UPDATE kategori SET kode='$kode', nama='$nama'";
    
            $db = new Database;
            if($db->connect()->query($sql)=== TRUE)
            {
                return "Berhasil Merubah Data";
            }
                return "Gagal Merubah Data";
            
        }

        public function delete($id,$data){
            $kode = $data["kode"];
        
                $sql = "DELETE FROM kategori WHERE id='id'";
        
                $db = new Database;
                if($db->connect()->query($sql)=== TRUE)
                {
                    return "Berhasil Hapus Data";
                }
                    return "Gagal Hapus Data";
                
            }


}

?>


