<?php
require_once __DIR__ . '/../models/PinjamanModel.php';
require_once __DIR__ . '/../models/AnggotaModel.php';
require_once __DIR__ . '/../models/BukuModel.php';

class PinjamanController {
    private $model;
    private $anggotaModel;
    private $bukuModel;

    public function __construct() {
        $this->model = new PinjamanModel();
        $this->anggotaModel = new AnggotaModel();
        $this->bukuModel = new BukuModel();
    }

    public function index() {
        $pinjaman = $this->model->getAllPinjaman();
        require_once __DIR__ . '/../views/pinjaman/index.php';
    }

    public function view($id) {
        $pinjaman = $this->model->getPinjamanById($id);
        require_once __DIR__ . '/../views/pinjaman/view.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idAnggota = $_POST['id_anggota'];
            $idBuku = $_POST['id_buku'];
            $tanggalPinjam = $_POST['tanggal_pinjam'];
            $jumlah = $_POST['jumlah'];
            
            if ($this->model->createPinjaman($idAnggota, $idBuku, $tanggalPinjam, $jumlah)) {
                header('Location: /pinjaman');
                exit;
            } else {
                $error = "Gagal menambahkan pinjaman";
            }
        }
        
        $anggota = $this->anggotaModel->getAllAnggota();
        $buku = $this->bukuModel->getAllBuku();
        require_once __DIR__ . '/../views/pinjaman/create.php';
    }

    public function bukuDipinjam() {
        $bukuDipinjam = $this->model->getBukuDipinjam();
        require_once __DIR__ . '/../views/pinjaman/buku_dipinjam.php';
    }

    public function statistik() {
        $statistik = $this->model->getStatistikPeminjaman();
        $peminjamAktif = $this->model->getPeminjamAktif();
        require_once __DIR__ . '/../views/pinjaman/statistik.php';
    }
}
?>