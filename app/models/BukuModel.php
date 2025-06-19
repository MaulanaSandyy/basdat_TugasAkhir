<?php
require_once __DIR__ . '/../config/database.php';

class BukuModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAllBuku() {
        $sql = "SELECT * FROM DaftarBuku";
        $stmt = sqlsrv_query($this->db, $sql);
        $result = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function getBukuById($id) {
        $sql = "SELECT * FROM DaftarBuku WHERE IdBuku = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->db, $sql, $params);
        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }

    public function createBuku($judul, $pengarang, $tahunTerbit, $stok) {
        $sql = "INSERT INTO DaftarBuku (Judul, Pengarang, TahunTerbit, Stok) VALUES (?, ?, ?, ?)";
        $params = array($judul, $pengarang, $tahunTerbit, $stok);
        $stmt = sqlsrv_query($this->db, $sql, $params);
        return $stmt !== false;
    }

    public function updateBuku($id, $judul, $pengarang, $tahunTerbit, $stok) {
        $sql = "UPDATE DaftarBuku SET Judul = ?, Pengarang = ?, TahunTerbit = ?, Stok = ? WHERE IdBuku = ?";
        $params = array($judul, $pengarang, $tahunTerbit, $stok, $id);
        $stmt = sqlsrv_query($this->db, $sql, $params);
        return $stmt !== false;
    }

    public function deleteBuku($id) {
        $sql = "DELETE FROM DaftarBuku WHERE IdBuku = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->db, $sql, $params);
        return $stmt !== false;
    }

    public function updateStokBuku($idBuku, $jumlah) {
        $sql = "UPDATE DaftarBuku SET Stok = Stok + ? WHERE IdBuku = ?";
        $params = array($jumlah, $idBuku);
        $stmt = sqlsrv_query($this->db, $sql, $params);
        return $stmt !== false;
    }
}
?>