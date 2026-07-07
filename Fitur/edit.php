<?php

include "koneksi.php";

$id = $_GET['id'];
$query = "SELECT * FROM akun_registrasi 
          WHERE id_registrasi='$id'";
$result = $koneksi->query($query);
if ($result->num_rows == 0) {
    die("Data tidak ditemukan");
}
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Edit Akun</h2>
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id_registrasi" value="<?= $data['id_registrasi']; ?>">

        Username:
        <br>
        <input type="text" name="username" value="<?= $data['username']; ?>" required
            oninvalid="this.setCustomValidity('Username harus diisi')" oninput="this.setCustomValidity('')">"><br><br>
        Password:
        <br>
        <input type="password" name="password" value="<?= $data['password']; ?>" required
            oninvalid="this.setCustomValidity('Password harus diisi')" oninput="this.setCustomValidity('')"><br><br>
        Nama Registrasi:
        <br>
        <select name="nama_registrasi" required oninvalid="this.setCustomValidity('Nama registrasi harus dipilih')"
            oninput="this.setCustomValidity('')"><br><br>>
            <option value="Registrasi Umum" <?php
            if ($data['nama_registrasi'] == "Registrasi Umum") {
                echo "selected";
            }
            ?>>
                Registrasi Umum
            </option>
            <option value="Registrasi Khusus" <?php
            if ($data['nama_registrasi'] == "Registrasi Khusus") {
                echo "selected";
            }
            ?>>
                Registrasi Khusus
            </option>
        </select>
        <br><br>
        Urutan Tampil:
        <br>
        <input type="number" name="urutan_tampil" min="1" max="5" value="<?= $data['urutan_tampil']; ?>" required
            oninvalid="this.setCustomValidity('Urutan tampil harus diisi 1 sampai 5')"
            oninput="this.setCustomValidity('')"><br><br>
        Keterangan:
        <br>
        <input type="text" name="keterangan" value="<?= $data['keterangan']; ?>" required
            oninvalid="this.setCustomValidity('Keterangan harus diisi')" oninput="this.setCustomValidity('')"><br><br>
        Proses:
        <br>
        <input type="radio" name="proses" value="Ya" <?php if
        ($data['proses'] == "Ya") {
            echo "checked";
        } ?>>
        <label>Ya</label>
        <input type="radio" name="proses" value="Tidak" <?php if
        ($data['proses'] == "Tidak") {
            echo "checked";
        } ?>>
        <label>Tidak</label><br><br>
        <button type="submit">
            Simpan Perubahan
        </button>
        <a href="beranda.php">
            <button type="button">
                Batal
            </button>
        </a>
    </form>
</body>

</html>