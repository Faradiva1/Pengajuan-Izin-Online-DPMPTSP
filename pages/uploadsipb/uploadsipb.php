<?php
$id = $_GET['iduser'];
$idpengajuan = $_GET['idpengajuan'];
echo $idpengajuan;

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Upload Berkas Pengajuan</p>
        </div>
        <div class="card-body">
            <form action="?q=uploadprocesssipb&iduser=<?= $_GET['iduser']; ?>" method="POST"
                enctype="multipart/form-data">
                <table class="table table-bordered table-striped tabel-responsive">
                    <thead>
                        <tr class="bg-gradient-theme text-dark">
                            <td>Persyaratan</td>
                            <td>Upload Berkas</td>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" name="idpengaduan" value="<?php echo $idpengajuan; ?>">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                        <table>
                            <tr>
                                <!-- KTP -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ktp">KTP (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat"
                                                onclick="viewPDF('ktp')">Lihat</button>
                                            <label for="ktp" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="ktp" id="ktp" accept=".pdf" required
                                                style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="ktp-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!--Regis Bidan -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="regis_bidan">Surat Tanda Registrasi Bidan (PDF)<span
                                                    class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat"
                                                onclick="viewPDF('regis_bidan')">Lihat</button>
                                            <label for="regis_bidan" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="regis_bidan" id="regis_bidan" accept=".pdf"
                                                required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="regis_bidan-label">Pilih file
                                                PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- NPWP-->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="npwp">NPWP (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat"
                                                onclick="viewPDF('npwp')">Lihat</button>
                                            <label for="npwp" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="npwp" id="npwp" accept=".pdf" required
                                                style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="npwp-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Foto Lokasi -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="foto_lokasi">Foto Lokasi (PDF)<span
                                                    class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat"
                                                onclick="viewPDF('foto_lokasi')">Lihat</button>
                                            <label for="foto_lokasi" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="foto_lokasi" id="foto_lokasi" accept=".pdf"
                                                required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="foto_lokasi-label">Pilih file
                                                PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Daftar Sarana dan Prasarana -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="daftar_sarana_prasarana">Daftar Sarana dan Prasarana (PDF)<span
                                                    class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat"
                                                onclick="viewPDF('daftar_sarana_prasarana')">Lihat</button>
                                            <label for="daftar_sarana_prasarana" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="daftar_sarana_prasarana"
                                                id="daftar_sarana_prasarana" accept=".pdf" required
                                                style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="daftar_sarana_prasarana-label">Pilih file
                                                PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Ijazah Terakhir -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ijazah_terakhir">Foto Ijazah Terakhir (PDF)<span
                                                    class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat"
                                                onclick="viewPDF('ijazah_terakhir')">Lihat</button>
                                            <label for="ijazah_terakhir" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="ijazah_terakhir" id="ijazah_terakhir" accept=".pdf"
                                                required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="ijazah_terakhir-label">Pilih file
                                                PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Surat Rekomendasi -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="surat_rekomendasi">Surat Rekomendasi (PDF)<span
                                                    class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat"
                                                onclick="viewPDF('surat_rekomendasi')">Lihat</button>
                                            <label for="surat_rekomendasi" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="surat_rekomendasi" id="surat_rekomendasi"
                                                accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="surat_rekomendasi-label">Pilih file
                                                PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>




                            <!-- Lanjutkan untuk semua berkas yang diperlukan -->
                        </table>
                        <button type="submit" class="btn btn-primary">Kirim Berkas</button>
                    </tbody>
            </form>
        </div>
    </div>
</div>


<!-- Modal untuk menampilkan file PDF -->
<div class="modal fade" id="pdfViewerModal" tabindex="-1" role="dialog" aria-labelledby="pdfViewerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfViewerModalLabel">Dokumen PDF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Penampil PDF akan ditempatkan di sini -->
                <iframe id="pdfViewer" src="" frameborder="0" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
function viewPDF(inputName) {
    // Dapatkan file yang diunggah
    const fileInput = document.querySelector(`input[name="${inputName}"]`);
    const file = fileInput.files[0];

    if (file) {
        // Tampilkan nama file yang diunggah
        const fileNameLabel = document.getElementById(`${inputName}-label`);
        fileNameLabel.textContent = file.name;

        const reader = new FileReader();
        reader.onload = function(e) {
            // Tampilkan file PDF dalam modal
            const pdfViewer = document.getElementById("pdfViewer");
            pdfViewer.src = e.target.result;
            $('#pdfViewerModal').modal('show');
        };
        reader.readAsDataURL(file);
    }
}
</script>