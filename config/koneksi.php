<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = ""; 
    private $db   = "db_absensi";
    public $koneksi;

    public function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }
}

$db_obj = new Database();
$koneksi = $db_obj->koneksi; 
?>