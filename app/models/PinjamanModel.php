public function tambahPinjaman($idAnggota, $idBuku, $tanggalPinjam, $jumlah) {
    $sql = "EXEC TambahPinjaman @IdAnggota = ?, @IdBuku = ?, @TanggalPinjam = ?, @Jumlah = ?";
    $params = array($idAnggota, $idBuku, $tanggalPinjam, $jumlah);
    $stmt = sqlsrv_query($this->db, $sql, $params);
    return $stmt !== false;
}

public function getBukuDipinjam() {
    $sql = "SELECT 
                dp.IdPinjam,
                a.Nama AS NamaAnggota,
                db.Judul AS JudulBuku,
                dp.TanggalPinjam,
                dp.Jumlah
            FROM DaftarPinjaman dp
            JOIN Anggota a ON dp.IdAnggota = a.IdAnggota
            JOIN DaftarBuku db ON dp.IdBuku = db.IdBuku
            LEFT JOIN DaftarPengembalian dk ON dp.IdPinjam = dk.IdPinjam
            WHERE dk.IdKembali IS NULL";
    
    $stmt = sqlsrv_query($this->db, $sql);
    $result = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

public function getStatistikPeminjaman() {
    $sql = "SELECT 
                FORMAT(TanggalPinjam, 'yyyy-MM') AS Bulan,
                COUNT(*) AS TotalTransaksi,
                SUM(Jumlah) AS TotalBukuDipinjam
            FROM DaftarPinjaman
            GROUP BY FORMAT(TanggalPinjam, 'yyyy-MM')
            ORDER BY Bulan";
    
    $stmt = sqlsrv_query($this->db, $sql);
    $result = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}