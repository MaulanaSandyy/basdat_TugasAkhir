<?php
require_once __DIR__ . '/../config/database.php';

class PinjamanModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAllPinjaman() {
        $sql = "SELECT dp.*, a.Nama AS NamaAnggota, db.Judul AS JudulBuku 
                FROM DaftarPinjaman dp
                JOIN Anggota a ON dp.IdAnggota = a.IdAnggota
                JOIN DaftarBuku db ON dp.IdBuku = db.IdBuku";
        $stmt = sqlsrv_query($this->db, $sql);
        $result = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function getPinjamanById($id) {
        $sql = "SELECT dp.*, a.Nama AS NamaAnggota, db.Judul AS JudulBuku 
                FROM DaftarPinjaman dp
                JOIN Anggota a ON dp.IdAnggota = a.IdAnggota
                JOIN DaftarBuku db ON dp.IdBuku = db.IdBuku
                WHERE dp.IdPinjam = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->db, $sql, $params);
        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }

    public function createPinjaman($idAnggota, $idBuku, $tanggalPinjam, $jumlah) {
        $sql = "EXEC TambahPinjaman @IdAnggota = ?, @IdBuku = ?, @TanggalPinjam = ?, @Jumlah = ?";
        $params = array($idAnggota, $idBuku, $tanggalPinjam, $jumlah);
        $stmt = sqlsrv_query($this->db, $sql, $params);
        return $stmt !== false;
    }

    public function getBukuDipinjam() {
        $sql = "SELECT 
                    dp.IdPinjam,
                    a.Nama AS NamaAnggota,
                    db.Judul AS JudulBuku,
                    dp.TanggalPinjam,
                    dp.Jumlah
                FROM DaftarPinjaman dp
                JOIN Anggota a ON dp.IdAnggota = a.IdAnggota
                JOIN DaftarBuku db ON dp.IdBuku = db.IdBuku
                LEFT JOIN DaftarPengembalian dk ON dp.IdPinjam = dk.IdPinjam
                WHERE dk.IdKembali IS NULL";
        
        $stmt = sqlsrv_query($this->db, $sql);
        $result = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function getStatistikPeminjaman() {
        $sql = "SELECT 
                    FORMAT(TanggalPinjam, 'yyyy-MM') AS Bulan,
                    COUNT(*) AS TotalTransaksi,
                    SUM(Jumlah) AS TotalBukuDipinjam
                FROM DaftarPinjaman
                GROUP BY FORMAT(TanggalPinjam, 'yyyy-MM')
                ORDER BY Bulan";
        
        $stmt = sqlsrv_query($this->db, $sql);
        $result = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function getPeminjamAktif() {
        $sql = "SELECT 
                    a.Nama AS NamaAnggota,
                    COUNT(dp.IdPinjam) AS JumlahTransaksi,
                    SUM(dp.Jumlah) AS TotalBukuDipinjam
                FROM DaftarPinjaman dp
                JOIN Anggota a ON dp.IdAnggota = a.IdAnggota
                GROUP BY a.Nama
                ORDER BY TotalBukuDipinjam DESC
                OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY";
        
        $stmt = sqlsrv_query($this->db, $sql);
        $result = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }
}
?>