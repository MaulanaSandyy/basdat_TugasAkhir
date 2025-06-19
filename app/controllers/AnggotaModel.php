<?php
require_once __DIR__ . '/../models/AnggotaModel.php';

class AnggotaController {
    private $model;

    public function __construct() {
        $this->model = new AnggotaModel();
    }

    public function index() {
        $anggota = $this->model->getAllAnggota();
        require_once __DIR__ . '/../views/anggota/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $noTelp = $_POST['no_telp'];
            
            if ($this->model->createAnggota($nama, $alamat, $noTelp)) {
                header('Location: /anggota');
                exit;
            } else {
                $error = "Gagal menambahkan anggota";
            }
        }
        require_once __DIR__ . '/../views/anggota/create.php';
    }

    public function getRiwayatPinjaman($idAnggota) {
    $sql = "SELECT dp.IdPinjam, db.Judul AS JudulBuku, dp.TanggalPinjam, dp.Jumlah, 
                   CASE WHEN dk.IdKembali IS NULL THEN 'Dipinjam' ELSE 'Dikembalikan' END AS Status
            FROM DaftarPinjaman dp
            JOIN DaftarBuku db ON dp.IdBuku = db.IdBuku
            LEFT JOIN DaftarPengembalian dk ON dp.IdPinjam = dk.IdPinjam
            WHERE dp.IdAnggota = ?
            ORDER BY dp.TanggalPinjam DESC";
    
    $params = array($idAnggota);
    $stmt = sqlsrv_query($this->db, $sql, $params);
    $result = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

    // Metode lainnya (edit, delete, view)...
}
?>