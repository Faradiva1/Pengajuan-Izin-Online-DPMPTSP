<?php

$id = $_POST['id'];

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="card-text">Upload Berkas Pengajuan</p>
        </div>
        <div class="card-body">
            <form action="?q=uploadproses" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="id">id </label></td>
                        <td><input type="hidden" name="id" value="<?php echo $id = $_POST['id']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ktp">KTP (PDF)</label></td>
                        <td><input type="file" name="ktp" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="akta_pendirian">Akta Pendirian (PDF)</label></td>
                        <td><input type="file" name="akta_pendirian" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="surat_lokasi">Surat Lokasi (PDF)</label></td>
                        <td><input type="file" name="surat_lokasi" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="bukti_hak">Bukti Hak (PDF)</label></td>
                        <td><input type="file" name="bukti_hak" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="izin_lingkungan">Izin Lingkungan (PDF)</label></td>
                        <td><input type="file" name="izin_lingkungan" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="profil_klinik">Profil Klinik (PDF)</label></td>
                        <td><input type="file" name="profil_klinik" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="nib">NIB (PDF)</label></td>
                        <td><input type="file" name="nib" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="surat_dokter">Surat Dokter (PDF)</label></td>
                        <td><input type="file" name="surat_dokter" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="sip_dokter">SIP Dokter (PDF)</label></td>
                        <td><input type="file" name="sip_dokter" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="daftar_tenaga">Daftar Tenaga (PDF)</label></td>
                        <td><input type="file" name="daftar_tenaga" accept=".pdf" required></td>
                    </tr>
                    <tr>
                        <td><label for="surat_rekomendasi">Surat Rekomendasi (PDF)</label></td>
                        <td><input type="file" name="surat_rekomendasi" accept=".pdf" required></td>
                    </tr>
                </table>

                <input type="submit" value="Upload">
            </form>
        </div>
    </div>
</div>