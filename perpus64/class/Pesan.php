<?php
include_once("Database.php");

class Pesan {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all(){
        $sql = "SELECT * FROM pesan";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id){
        $sql = "SELECT * FROM pesan WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }
    public function findByUserId($id){
        $sql = "SELECT * FROM pesan WHERE penerima='$id'";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data){
        $kode = $data['kode'];
        $nama = $data['nama'];

        $sql = "INSERT INTO pesan (kode, nama) VALUES ('$kode','$nama')";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil menambah data pesan";
        }
        return "Gagal menambah data pesan";
    }
    
    public function update($id, $data){
        $kode = $data['kode'];
        $nama = $data['nama'];

        $sql = "UPDATE pesan SET kode = '$kode', nama='$nama' WHERE id = '$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil Mengupdate data pesan";
        }
        return "Gagal Mengupdate data pesan";
    }

    public function delete($id){
        $sql = "DELETE FROM pesan WHERE id = '$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil menghapus data pesan";
        }
        return "Gagal menghapus data pesan";
    }

    public function __destruct()
    {
        
    }
}
?>