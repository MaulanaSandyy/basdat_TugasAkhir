<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container">
    <h1>Detail Anggota</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($anggota['Nama']) ?></h5>
            <p class="card-text">
                <strong>Alamat:</strong> <?= htmlspecialchars($anggota['Alamat']) ?><br>
                <strong>No. Telepon:</strong> <?= htmlspecialchars($anggota['NoTelp']) ?>
            </p>
            <a href="/anggota/edit/<?= $anggota['IdAnggota'] ?>" class="btn btn-warning">Edit</a>
            <a href="/anggota" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    
    <h2 class="mt-4">Riwayat Pinjaman</h2>
    <?php if (!empty($riwayatPinjaman)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riwayatPinjaman as $pinjam): ?>
                <tr>
                    <td><?= htmlspecialchars($pinjam['JudulBuku']) ?></td>
                    <td><?= $pinjam['TanggalPinjam']->format('Y-m-d') ?></td>
                    <td><?= $pinjam['Jumlah'] ?></td>
                    <td>
                        <?php if ($pinjam['Status'] == 'Dipinjam'): ?>
                            <span class="badge bg-warning">Dipinjam</span>
                        <?php else: ?>
                            <span class="badge bg-success">Dikembalikan</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Belum ada riwayat pinjaman</div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>