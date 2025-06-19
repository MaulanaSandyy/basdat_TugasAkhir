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

    // Metode lainnya (edit, delete, view)...
}
?>