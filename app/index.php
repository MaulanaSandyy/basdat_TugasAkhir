<?php
require_once __DIR__ . '/../app/controllers/AnggotaController.php';
require_once __DIR__ . '/../app/controllers/BukuController.php';
require_once __DIR__ . '/../app/controllers/PinjamanController.php';
require_once __DIR__ . '/../app/controllers/PengembalianController.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = '/perpustakaan-website/public';

// Hapus base path dari request
$route = str_replace($basePath, '', $request);

// Routing
switch ($route) {
    case '/':
    case '/dashboard':
        require __DIR__ . '/../app/views/dashboard.php';
        break;
        
    // Anggota Routes
    case '/anggota':
        $controller = new AnggotaController();
        $controller->index();
        break;
    case '/anggota/create':
        $controller = new AnggotaController();
        $controller->create();
        break;
    case (preg_match('/^\/anggota\/view\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new AnggotaController();
        $controller->view($matches[1]);
        break;
    case (preg_match('/^\/anggota\/edit\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new AnggotaController();
        $controller->edit($matches[1]);
        break;
    case (preg_match('/^\/anggota\/delete\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new AnggotaController();
        $controller->delete($matches[1]);
        break;
        
    // Buku Routes
    case '/buku':
        $controller = new BukuController();
        $controller->index();
        break;
    case '/buku/create':
        $controller = new BukuController();
        $controller->create();
        break;
    case (preg_match('/^\/buku\/view\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new BukuController();
        $controller->view($matches[1]);
        break;
    case (preg_match('/^\/buku\/edit\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new BukuController();
        $controller->edit($matches[1]);
        break;
    case (preg_match('/^\/buku\/delete\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new BukuController();
        $controller->delete($matches[1]);
        break;
        
    // Pinjaman Routes
    case '/pinjaman':
        $controller = new PinjamanController();
        $controller->index();
        break;
    case '/pinjaman/create':
        $controller = new PinjamanController();
        $controller->create();
        break;
    case '/pinjaman/buku-dipinjam':
        $controller = new PinjamanController();
        $controller->bukuDipinjam();
        break;
    case '/pinjaman/statistik':
        $controller = new PinjamanController();
        $controller->statistik();
        break;
    case (preg_match('/^\/pinjaman\/view\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new PinjamanController();
        $controller->view($matches[1]);
        break;
        
    // Pengembalian Routes
    case '/pengembalian':
        $controller = new PengembalianController();
        $controller->index();
        break;
    case '/pengembalian/create':
        $controller = new PengembalianController();
        $controller->create();
        break;
    case '/pengembalian/laporan-lama-pinjam':
        $controller = new PengembalianController();
        $controller->laporanLamaPinjam();
        break;
        
    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
?>