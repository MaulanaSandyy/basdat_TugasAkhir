<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container">
    <h1>Tambah Transaksi Pengembalian</h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <form method="post">
        <div class="form-group">
            <label for="id_pinjam">Peminjaman</label>
            <select class="form-control" id="id_pinjam" name="id_pinjam" required>
                <option value="">Pilih Transaksi Pinjaman</option>
                <?php foreach ($pinjamanAktif as $p): ?>
                <option value="<?= $p['IdPinjam'] ?>">
                    <?= $p['NamaAnggota'] ?> - <?= $p['JudulBuku'] ?> (<?= $p['TanggalPinjam']->format('Y-m-d') ?>)
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/pengembalian" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>