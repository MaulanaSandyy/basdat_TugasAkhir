<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container">
    <h1>Daftar Anggota</h1>
    <a href="/anggota/create" class="btn btn-primary mb-3">Tambah Anggota</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anggota as $a): ?>
            <tr>
                <td><?= $a['IdAnggota'] ?></td>
                <td><?= $a['Nama'] ?></td>
                <td><?= $a['Alamat'] ?></td>
                <td><?= $a['NoTelp'] ?></td>
                <td>
                    <a href="/anggota/view/<?= $a['IdAnggota'] ?>" class="btn btn-info btn-sm">Lihat</a>
                    <a href="/anggota/edit/<?= $a['IdAnggota'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/anggota/delete/<?= $a['IdAnggota'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>