<?php
require_once __DIR__ . '/../config/database.php';

class PengembalianModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAllPengembalian() {
        $sql = "SELECT dk.*, dp.IdAnggota, dp.IdBuku, dp.TanggalPinjam, dp.Jumlah,
                       a.Nama AS NamaAnggota, db.Judul AS JudulBuku
                FROM DaftarPengembalian dk
                JOIN DaftarPinjaman dp ON dk.IdPinjam = dp.IdPinjam
                JOIN Anggota a ON dp.IdAnggota = a.IdAnggota
                JOIN DaftarBuku db ON dp.IdBuku = db.IdBuku";
        $stmt = sqlsrv_query($this->db, $sql);
        $result = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function createPengembalian($idPinjam, $tanggalKembali) {
        $sql = "EXEC TambahPengembalian @IdPinjam = ?, @TanggalKembali = ?";
        $params = array($idPinjam, $tanggalKembali);
        $stmt = sqlsrv_query($this->db, $sql, $params);
        return $stmt !== false;
    }

    public function getLamaPinjam() {
        $sql = "SELECT 
                    dp.IdPinjam,
                    dp.TanggalPinjam,
                    dk.TanggalKembali,
                    DATEDIFF(DAY, dp.TanggalPinjam, dk.TanggalKembali) AS LamaPinjam
                FROM DaftarPinjaman dp
                JOIN DaftarPengembalian dk ON dp.IdPinjam = dk.IdPinjam";
        
        $stmt = sqlsrv_query($this->db, $sql);
        $result = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }
}
?>