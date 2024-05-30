<?php
$id = $_GET['iduser'];
$idpengajuan = $_GET['idpengajuan'];


?>

<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <p class="card-text">Upload Berkas Pengajuan</p>
        </div>
        <div class="card-body">
            <form action="?q=uploadprocess&iduser=<?= $_GET['iduser']; ?>" method="POST" enctype="multipart/form-data">
                <table class="border-0">
                    <thead class="border-0">
                        <tr class="bg-gradient-theme text-dark">
                            <td>Persyaratan</td>
                            <td>Upload Berkas</td>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        <input type="hidden" name="idpengaduan" value="<?php echo $idpengajuan; ?>">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                        <table class="border-0">

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
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('ktp')">Lihat</button>
                                            <label for="ktp" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="ktp" id="ktp" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="ktp-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Akta Pendirian -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="akta_pendirian">Akta Pendirian (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('akta_pendirian')">Lihat</button>
                                            <label for="akta_pendirian" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="akta_pendirian" id="akta_pendirian" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="akta_pendirian-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>

                                <!-- Surat Lokasi -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="surat_lokasi">Surat Lokasi (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('surat_lokasi')">Lihat</button>
                                            <label for="surat_lokasi" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="surat_lokasi" id="surat_lokasi" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="surat_lokasi-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Bukti Hak -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bukti_hak">Bukti Hak (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('bukti_hak')">Lihat</button>
                                            <label for="bukti_hak" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="bukti_hak" id="bukti_hak" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="bukti_hak-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Izin Lingkungan -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="izin_lingkungan">Izin Lingkungan (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('izin_lingkungan')">Lihat</button>
                                            <label for="izin_lingkungan" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="izin_lingkungan" id="izin_lingkungan" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="izin_lingkungan-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Profil Klinik -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profil_klinik">Profil Klinik (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('profil_klinik')">Lihat</button>
                                            <label for="profil_klinik" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="profil_klinik" id="profil_klinik" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="profil_klinik-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- NIB -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nib">NIB (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('nib')">Lihat</button>
                                            <label for="nib" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="nib" id="nib" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="nib-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Surat Dokter -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="surat_dokter">Surat Dokter (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('surat_dokter')">Lihat</button>
                                            <label for="surat_dokter" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="surat_dokter" id="surat_dokter" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="surat_dokter-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- SIP Dokter -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sip_dokter">SIP Dokter (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('sip_dokter')">Lihat</button>
                                            <label for="sip_dokter" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="sip_dokter" id="sip_dokter" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="sip_dokter-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Daftar Tenaga -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="daftar_tenaga">Daftar Tenaga (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('daftar_tenaga')">Lihat</button>
                                            <label for="daftar_tenaga" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="daftar_tenaga" id="daftar_tenaga" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="daftar_tenaga-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                            <tr>
                                <!-- Surat Rekomendasi -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="surat_rekomendasi">Surat Rekomendasi (PDF)<span class="required">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary-lihat" onclick="viewPDF('surat_rekomendasi')">Lihat</button>
                                            <label for="surat_rekomendasi" class="custom-file-upload">
                                                <i class="fas fa-cloud-upload-alt"></i> Unggah File
                                            </label>
                                            <input type="file" name="surat_rekomendasi" id="surat_rekomendasi" accept=".pdf" required style="display:none;">
                                            <!-- Tampilkan keterangan nama file -->
                                            <span class="file-name-label" id="surat_rekomendasi-label">Pilih file PDF...</span>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <button type="submit" class="btn btn-primary">Kirim Berkas</button>
                        </table>
                    </tbody>
            </form>
            </table>
        </div>
    </div>
</div>

<!-- Modal untuk menampilkan file PDF -->
<div class="modal fade" id="pdfViewerModal" tabindex="-1" role="dialog" aria-labelledby="pdfViewerModalLabel" aria-hidden="true">
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