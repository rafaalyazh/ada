<?php

include_once("Database.php");

class Pemberitahuan{
    public function all(){
        $sql = "SELECT * FROM pemberitahuan";
        $db = new Database;
        return $db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM pemberitahuan WHERE id='$id'";

        $db = new Database;
        return $db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
    $isi = $data["isi"];
    $status = $data["status"];

        $sql = "INSERT INTO pemberitahuan (isi, status) VALUES ('$isi',' $status')";

        $db = new Database;
        if($db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menambah data peminjaman";
        }
            return "Gagal menambah data peminjaman";
        
    }

    public function update($data){
        $isi = $data["isi"];
        $status = $data["status"];
    
            $sql = "UPDATE pemberitahuan SET isi='$isi', status='$status'";
    
            $db = new Database;
            if($db->connect()->query($sql)=== TRUE)
            {
                return "Berhasil Merubah Data";
            }
                return "Gagal Merubah Data";
            
        }

        public function delete($data){
            $isi = $data["isi"];
        
                $sql = "DELETE FROM pemberitahuan WHERE id='id'";
                $db = new Database;
                if($db->connect()->query($sql)=== TRUE)
                {
                    return "Berhasil Hapus Data";
                }
                    return "Gagal Hapus Data";
                
            }
}

?>

<!-- Copyright 2020 @ADI_05 -->