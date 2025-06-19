<?php
require_once __DIR__ . '/../models/PengembalianModel.php';
require_once __DIR__ . '/../models/PinjamanModel.php';

class PengembalianController {
    private $model;
    private $pinjamanModel;

    public function __construct() {
        $this->model = new PengembalianModel();
        $this->pinjamanModel = new PinjamanModel();
    }

    public function index() {
        $pengembalian = $this->model->getAllPengembalian();
        require_once __DIR__ . '/../views/pengembalian/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idPinjam = $_POST['id_pinjam'];
            $tanggalKembali = $_POST['tanggal_kembali'];
            
            if ($this->model->createPengembalian($idPinjam, $tanggalKembali)) {
                header('Location: /pengembalian');
                exit;
            } else {
                $error = "Gagal menambahkan pengembalian";
            }
        }
        
        $pinjamanAktif = $this->pinjamanModel->getBukuDipinjam();
        require_once __DIR__ . '/../views/pengembalian/create.php';
    }

    public function laporanLamaPinjam() {
        $lamaPinjam = $this->model->getLamaPinjam();
        require_once __DIR__ . '/../views/pengembalian/laporan_lama_pinjam.php';
    }
}
?>