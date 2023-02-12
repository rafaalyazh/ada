<?php

include_once("Database.php");

class Penerbit{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all(){
        $sql = "SELECT * FROM penerbit";
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM penerbit WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
    $kode = $data["kode"];
    $nama = $data["nama"];
    $verif = $data["verif"];

        $sql = "INSERT INTO penerbit (kode, nama, verif) VALUES ('$kode','$nama','$verif')";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil menambah data penerbit";
        }
        return "Gagal menambah data penerbit";
        
    }

    public function update($id,$data){
        $kode = $data["kode"];
        $nama = $data["nama"];
        $verif = $data["verif"];

            $sql = "UPDATE penerbit SET kode='$kode', nama='$nama', verif='$verif' where id='$id'";
    
            if($this->db->connect()->query($sql) === TRUE){
                return "Berhasil mengupdate data penerbit";
            }
            return "Gagal mengupdate data penerbit";
            
            
        }

        public function delete($id){
                $sql = "DELETE FROM penerbit WHERE id='$id'";
    
                if($this->db->connect()->query($sql) === TRUE){
                {
                    return "Berhasil Hapus Data";
                }
                    return "Gagal Hapus Data";
                
            }

}
}
?>


