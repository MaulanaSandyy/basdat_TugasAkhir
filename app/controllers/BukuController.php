<?php
require_once __DIR__ . '/../models/BukuModel.php';

class BukuController {
    private $model;

    public function __construct() {
        $this->model = new BukuModel();
    }

    public function index() {
        $buku = $this->model->getAllBuku();
        require_once __DIR__ . '/../views/buku/index.php';
    }

    public function view($id) {
        $buku = $this->model->getBukuById($id);
        require_once __DIR__ . '/../views/buku/view.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $tahunTerbit = $_POST['tahun_terbit'];
            $stok = $_POST['stok'];
            
            if ($this->model->createBuku($judul, $pengarang, $tahunTerbit, $stok)) {
                header('Location: /buku');
                exit;
            } else {
                $error = "Gagal menambahkan buku";
            }
        }
        require_once __DIR__ . '/../views/buku/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $tahunTerbit = $_POST['tahun_terbit'];
            $stok = $_POST['stok'];
            
            if ($this->model->updateBuku($id, $judul, $pengarang, $tahunTerbit, $stok)) {
                header('Location: /buku');
                exit;
            } else {
                $error = "Gagal mengupdate buku";
            }
        }
        
        $buku = $this->model->getBukuById($id);
        require_once __DIR__ . '/../views/buku/edit.php';
    }

    public function delete($id) {
        if ($this->model->deleteBuku($id)) {
            header('Location: /buku');
            exit;
        } else {
            $error = "Gagal menghapus buku";
            require_once __DIR__ . '/../views/buku/index.php';
        }
    }
}
?>