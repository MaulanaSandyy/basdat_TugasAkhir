<?php 
require_once __DIR__ . '/../models/PinjamanModel.php';
$pinjamanModel = new PinjamanModel();
$statistik = $pinjamanModel->getStatistikPeminjaman();
$peminjamAktif = $pinjamanModel->getPeminjamAktif();
?>

<?php require_once __DIR__ . '/layout/header.php'; ?>

<div class="container">
    <h1>Dashboard Perpustakaan</h1>
    
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Statistik Peminjaman per Bulan
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Total Transaksi</th>
                                <th>Total Buku Dipinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($statistik as $stat): ?>
                            <tr>
                                <td><?= $stat['Bulan'] ?></td>
                                <td><?= $stat['TotalTransaksi'] ?></td>
                                <td><?= $stat['TotalBukuDipinjam'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Top 5 Peminjam Aktif
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Anggota</th>
                                <th>Jumlah Transaksi</th>
                                <th>Total Buku Dipinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($peminjamAktif as $p): ?>
                            <tr>
                                <td><?= $p['NamaAnggota'] ?></td>
                                <td><?= $p['JumlahTransaksi'] ?></td>
                                <td><?= $p['TotalBukuDipinjam'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/layout/footer.php'; ?>