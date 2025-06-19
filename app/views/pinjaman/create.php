<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container">
    <h1>Tambah Transaksi Pinjaman</h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <form method="post">
        <div class="form-group">
            <label for="id_anggota">Anggota</label>
            <select class="form-control" id="id_anggota" name="id_anggota" required>
                <option value="">Pilih Anggota</option>
                <?php foreach ($anggota as $a): ?>
                <option value="<?= $a['IdAnggota'] ?>"><?= $a['Nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_buku">Buku</label>
            <select class="form-control" id="id_buku" name="id_buku" required>
                <option value="">Pilih Buku</option>
                <?php foreach ($buku as $b): ?>
                <option value="<?= $b['IdBuku'] ?>"><?= $b['Judul'] ?> (Stok: <?= $b['Stok'] ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/pinjaman" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>