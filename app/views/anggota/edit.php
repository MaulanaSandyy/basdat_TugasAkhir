<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container">
    <h1>Edit Data Anggota</h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <form method="post">
        <div class="form-group">
            <label for="nama">Nama Anggota</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($anggota['Nama']) ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required><?= htmlspecialchars($anggota['Alamat']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="no_telp">No. Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= htmlspecialchars($anggota['NoTelp']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="/anggota" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>