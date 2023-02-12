<?php
include_once("Database.php");

class User {
    private $db;

    public function __construct()
    {
        //Method yang pertama kali dipanggil saat instansiasi objek
        //echo "Selamat Datang";
        $this->db = new Database;
    }

    public function all(){
        $sql ="SELECT * FROM user";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getAnggota(){
        $sql ="SELECT * from user Where role = 'user'";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);   
    }

    public function getAdministrator(){
        $sql ="SELECT * FROM user Where role = 'admin'";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT *FROM user WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
        $kode = $data["kode"];
        $nis= $data["nis"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];
        $verif= $data["verif"];
        $role= $data["role"];
        $join_date= $data["join_date"];
        $foto= $data["foto"];

        $sql = "INSERT INTO user (kode, nis, fullname , username , password , kelas , alamat, role, join_date, foto) VALUES ('$kode','$nis','$fullname','$username','$password','$kelas','$alamat', '$role', '$join_date', '$foto')";

        if($this->db->connect()->query($sql) ===  TRUE){
            return "Berhasil Menambahkan data user";
        }
            return "Gagal Menambahkan data user";
    }

    public function createAdmin($data){
        $kode = $data["kode"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $verif= $data["verif"];
        $role= $data["role"];
        $join_date= $data["join_date"];
        $foto= $data["foto"];

        $sql = "INSERT INTO user(kode, fullname , username , password , role, join_date, foto) VALUES ('$kode','$fullname','$username','$password','$role','$join_date','$foto')";

        if($this->db->connect()->query($sql) ===  TRUE){
            return "Berhasil Menambahkan data ";
        }
            return "Gagal Menambahkan data ";
    }

    public function update($id,$data){

        $nis= $data["nis"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];

        $sql ="UPDATE user SET nis ='$nis' , fullname = '$fullname', username = '$username' , password = '$password', kelas = '$kelas', alamat = '$alamat' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil Mengupdate data user";
        }
            return "Gagal Mengupdate data user";
    }

    public function delete($id){
        $sql = "DELETE FROM user where id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil menghapus data user";
        }
            return "Gagal menghapus data user";
    }

    public function __destruct(){
        //Method yang terakhir kali dipanggil saat instansiasi objek
        //echo"Selamat tinggal";
    }
}
?>
