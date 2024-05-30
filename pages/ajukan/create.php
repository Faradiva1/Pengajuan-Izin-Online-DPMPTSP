<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pengajuan</title>
</head>
<body>
    <h1>Formulir Pengajuan</h1>
    <form action="create_process.php" method="post">
        <label for="kecamatan">Kecamatan:</label>
        <select name="kecamatan" id="kecamatan">
            <option value="Bolmong Timur">Bolmong Timur</option>
            <option value="Bolmong Barat">Bolmong Barat</option>
        </select><br><br>

        <label for="kelurahan">Kelurahan:</label>
        <select name="kelurahan" id="kelurahan">
            <option value="Buyat">Buyat</option>
            <option value="Kotabunan">Kotabunan</option>
        </select><br><br>

        <label for="bentuk_usaha">Bentuk Usaha:</label>
        <select name="bentuk_usaha" id="bentuk_usaha">
            <option value="Yayasan">Yayasan</option>
            <option value="BUMN">BUMN</option>
        </select><br><br>

        <label for="jenis_klinik">Jenis Klinik:</label>
        <select name="jenis_klinik" id="jenis_klinik">
            <option value="Pratama">Pratama</option>
            <option value="Utama">Utama</option>
        </select><br><br>

        <input type="submit" value="Ajukan">
    </form>
</body>
</html>
