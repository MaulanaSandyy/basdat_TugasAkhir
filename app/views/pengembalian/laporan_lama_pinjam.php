<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container">
    <h1>Laporan Lama Pinjam Buku</h1>
    
    <?php if (!empty($lamaPinjam)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Lama Pinjam (hari)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lamaPinjam as $pinjam): ?>
                <tr>
                    <td><?= $pinjam['IdPinjam'] ?></td>
                    <td><?= $pinjam['TanggalPinjam']->format('Y-m-d') ?></td>
                    <td><?= $pinjam['TanggalKembali']->format('Y-m-d') ?></td>
                    <td><?= $pinjam['LamaPinjam'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Belum ada data pengembalian</div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>