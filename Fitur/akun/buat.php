<!DOCTYPE html>
<html>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <h2>Tambah Akun</h2>

    <form action="../../API/CRUD/proses_buat.php" method="POST">

        Username:
        <input type="text" name="username" required oninvalid="this.setCustomValidity('Username harus diisi')"
            oninput="this.setCustomValidity('')"><br><br>
        Password:
        <input type="password" name="password" required oninvalid="this.setCustomValidity('Password harus diisi')"
            oninput="this.setCustomValidity('')"><br><br>

        Nama Registrasi:
        <select name="nama_registrasi" id="nama_registrasi" onchange="ubahKode()" required
            oninvalid="this.setCustomValidity('Silahkan pilih jenis registrasi')" oninput="this.setCustomValidity('')">
            <option value="" disabled selected hidden>-- Pilih Registrasi --</option>
            <option value="Registrasi Umum">Registrasi Umum</option>
            <option value="Registrasi Khusus">Registrasi Khusus</option>
        </select>
        <br><br>

        Urutan Tampil:
        <input type="number" name="urutan_tampil" min="1" max="5" required
            oninvalid="this.setCustomValidity('Urutan Tampil harus diisi')" oninput="this.setCustomValidity('')">
        <br><br>

        Keterangan:
        <input type="text" name="keterangan">
        <br><br>

        proses:
        <input type="radio" name="proses" value="Ya" checked readonly>
        <label>Ya</label>
        <input type="radio" name="proses" value="Tidak" readonly>
        <label>Tidak</label><br><br>
        <button type="submit">
            <a href="beranda.php"></a>
            Buat Akun
        </button>
        <a href="../../beranda.php">
            <button type="button">
                Batal
            </button>
        </a>

    </form>

</body>

</html>