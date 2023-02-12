    <?php
    include_once('Database.php');
    

    class Peminjaman{
        private $db;
        
        public function __construct()
        {
            $this->db = new Database;
        }

        public function all(){
            $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman,
            peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian,
            peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE
            peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id";

            return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
        }

        public function getPeminjaman(){
            $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman,
            peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian,
            peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE
            peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is NULL";

            return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
        }
        public function getPengembalian(){
            $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian ,
            peminjaman.kondisi_buku_saat_dipinjam , peminjaman.kondisi_buku_saat_dikembalikan FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id
            AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is not null";

            return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
        }

        public function find($id){
            $sql = "SELECT buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman. 
            kondisi_buku_saat_dipinjam FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND
            peminjaman.id_user = $id AND tanggal_pengembalian is null";

            return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
        }

        public function findkembali($id){
            $sql = "SELECT buku.judul as buku, peminjaman.tanggal_pengembalian, peminjaman. 
            kondisi_buku_saat_dikembalikan FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND
            peminjaman.id_user = $id AND tanggal_pengembalian is not null";

            return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
        }

        public function create($data){
            $id_user = $data ["id_user"];
            $id_buku = $data ["id_buku"];
            $tanggal_peminjaman = $data ["tanggal_peminjaman"];
            $kondisi_buku_saat_dipinjam = $data ["kondisi_buku_saat_dipinjam"];

            $sql = "INSERT INTO peminjaman (id_user, id_buku, tanggal_peminjaman,
            kondisi_buku_saat_dipinjam) VALUES ('$id_user','$id_buku','$tanggal_peminjaman','$kondisi_buku_saat_dipinjam')";

            if($this->db->connect()->query($sql) === TRUE){
                return "Berhasil menambah data Peminjam";
            }
            return "Gagal menambah data Peminjam";
        }

        public function update($id, $data){
            $id_user = $data ["id_user"];
            $id_buku = $data ["id_buku"];

            $sql = "UPDATE peminjaman SET id_user = '$id_user' , id_buku= '$id_buku' WHERE id = '$id'";

            if($this->db->connect()->query($sql) === TRUE){
                return "Berhasil mengupdate data Peminjam";
            }
            return "Gagal mengupdate data Peminjam";
        }

        public function delete($id){
        $sql = "DELETE FROM peminjaman WHERE id = '$id'";

            if($this->db->connect()->query($sql) === TRUE){
                return "Berhasil menghapus data Peminjam";
            }
            return "Gagal menghapus data Peminjam";
        }

        public function __destruct()
        {

        }
    }
    ?>