<?php
require_once __DIR__ . '/../app/controllers/AnggotaController.php';
require_once __DIR__ . '/../app/controllers/BukuController.php';
require_once __DIR__ . '/../app/controllers/PinjamanController.php';
require_once __DIR__ . '/../app/controllers/PengembalianController.php';

$request = $_SERVER['REQUEST_URI'];
$basePath = '/perpustakaan-website/public';

switch (str_replace($basePath, '', $request)) {
    case '/':
    case '/dashboard':
        require __DIR__ . '/../app/views/dashboard.php';
        break;
    case '/anggota':
        $controller = new AnggotaController();
        $controller->index();
        break;
    case '/anggota/create':
        $controller = new AnggotaController();
        $controller->create();
        break;
    // Rute lainnya...
    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
?>