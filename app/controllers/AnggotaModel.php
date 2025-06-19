public function getRiwayatPinjaman($idAnggota) {
    $sql = "SELECT dp.IdPinjam, db.Judul AS JudulBuku, dp.TanggalPinjam, dp.Jumlah, 
                   CASE WHEN dk.IdKembali IS NULL THEN 'Dipinjam' ELSE 'Dikembalikan' END AS Status
            FROM DaftarPinjaman dp
            JOIN DaftarBuku db ON dp.IdBuku = db.IdBuku
            LEFT JOIN DaftarPengembalian dk ON dp.IdPinjam = dk.IdPinjam
            WHERE dp.IdAnggota = ?
            ORDER BY dp.TanggalPinjam DESC";
    
    $params = array($idAnggota);
    $stmt = sqlsrv_query($this->db, $sql, $params);
    $result = array();
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}