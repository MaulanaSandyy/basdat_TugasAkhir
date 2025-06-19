<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container">
    <h1>Buku yang Sedang Dipinjam</h1>
    
    <?php if (!empty($bukuDipinjam)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bukuDipinjam as $pinjam): ?>
                <tr>
                    <td><?= htmlspecialchars($pinjam['NamaAnggota']) ?></td>
                    <td><?= htmlspecialchars($pinjam['JudulBuku']) ?></td>
                    <td><?= $pinjam['TanggalPinjam']->format('Y-m-d') ?></td>
                    <td><?= $pinjam['Jumlah'] ?></td>
                    <td>
                        <a href="/pengembalian/create?pinjam_id=<?= $pinjam['IdPinjam'] ?>" class="btn btn-success btn-sm">Catat Pengembalian</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Tidak ada buku yang sedang dipinjam</div>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>