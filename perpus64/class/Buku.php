<?php
include_once('Database.php');

class Buku {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all(){
    $sql = "SELECT buku.id, buku.judul, buku.pengarang, buku.j_buku_baik , buku.j_buku_rusak , buku.tahun_terbit , buku.isbn , kategori.nama as nama_kategori , penerbit.nama  as nama_penerbit FROM buku, penerbit, kategori WHERE buku.penerbit_id = penerbit.id AND buku.kategori_id = kategori.id";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM buku WHERE id ='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
        $judul = $data["judul"];
        $kategori_id = $data["kategori_id"];
        $penerbit_id = $data["penerbit_id"];
        $pengarang = $data["pengarang"];
        $tahun_terbit = $data["tahun_terbit"];
        $isbn = $data["isbn"];
        $j_buku_rusak = $data["j_buku_rusak"];
        $j_buku_baik = $data["j_buku_baik"];

        $sql = "INSERT INTO buku(judul ,kategori_id ,penerbit_id ,pengarang ,tahun_terbit ,isbn ,j_buku_rusak ,j_buku_baik )VALUES('$judul','$kategori_id','$penerbit_id ','$pengarang','$tahun_terbit','$isbn' ,'$j_buku_rusak','$j_buku_baik')";

        if($this->db->connect()->query($sql) === TRUE){
        return "Berhasil menambah data buku";
        }
        return "Gagal menambah data buku";
    }

    public function update($id,$data){
        $judul = $data["judul"];
        $kategori_id = $data["kategori_id"];
        $penerbit_id = $data["penerbit_id"];
        $pengarang = $data["pengarang"];
        $tahun_terbit = $data["tahun_terbit"];
        $isbn = $data["isbn"];
        $j_buku_baik = $data["j_buku_baik"];
        $j_buku_rusak = $data["j_buku_rusak"];
        $foto = $data["foto"];

        $sql = "UPDATE buku SET judul='$judul' , kategori_id='$kategori_id ' , penerbit_id='$penerbit_id' , pengarang='$pengarang' , tahun_terbit='$tahun_terbit' , isbn='$isbn' , j_buku_baik='$j_buku_baik' , j_buku_rusak='$j_buku_rusak' , foto='$foto' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil menambah data buku";
        }
        return "Gagal menambah data buku";
    }

    public function delete($id){
       
        $sql = "DELETE FROM buku WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil menambah data buku";
        }
        return "Gagal menambah data buku";
    }

    public function __destruct()
    {
        
    }
}
?>