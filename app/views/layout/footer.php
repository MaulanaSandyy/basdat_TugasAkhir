        </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-book me-2"></i> Perpustakaan Digital</h5>
                    <p class="text-muted">Sistem manajemen perpustakaan modern untuk pengelolaan buku dan transaksi peminjaman.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/dashboard" class="text-decoration-none text-muted">Dashboard</a></li>
                        <li><a href="/anggota" class="text-decoration-none text-muted">Anggota</a></li>
                        <li><a href="/buku" class="text-decoration-none text-muted">Daftar Buku</a></li>
                        <li><a href="/pinjaman" class="text-decoration-none text-muted">Peminjaman</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled text-muted">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Perpustakaan No. 123</li>
                        <li><i class="fas fa-phone me-2"></i> (021) 1234567</li>
                        <li><i class="fas fa-envelope me-2"></i> info@perpustakaan.com</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; <?= date('Y') ?> Sistem Perpustakaan. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-decoration-none text-muted me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-decoration-none text-muted me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-decoration-none text-muted me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-decoration-none text-muted"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom JS -->
    <script src="/assets/js/script.js"></script>
    
    <script>
        // Inisialisasi DataTable
        $(document).ready(function() {
            $('.data-table').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
                },
                responsive: true
            });
            
            // Tooltip
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Auto-dismiss alerts after 5 seconds
            setTimeout(() => {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    new bootstrap.Alert(alert).close();
                });
            }, 5000);
        });
    </script>
</body>
</html>