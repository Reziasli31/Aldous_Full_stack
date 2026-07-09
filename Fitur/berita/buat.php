<!DOCTYPE html>
<html>

<head>

    <title>Tambah Berita</title>

</head>


<body>


<h2>Tambah Berita</h2>

<hr>


<form action="../../API/CRUD/berita_buat.php" method="POST" enctype="multipart/form-data">


    Judul Berita:
    <br>

    <input type="text" 
           name="judul_berita"
           required
           oninvalid="this.setCustomValidity('Judul berita harus diisi')"
           oninput="this.setCustomValidity('')">

    <br><br>



    Isi Berita:
    <br>

    <textarea name="isi_berita"
              rows="10"
              cols="50"
              required
              oninvalid="this.setCustomValidity('Isi berita harus diisi')"
              oninput="this.setCustomValidity('')"></textarea>

    <br><br>



    Gambar Berita:
    <br>

    <input type="file"
           name="gambar"
           accept="image/*"
           required
           oninvalid="this.setCustomValidity('Gambar berita harus dipilih')"
           oninput="this.setCustomValidity('')">

    <br><br>



    <button type="submit">

        Tambah Berita

    </button>


    <a href="../../berita.php">

        <button type="button">

            Batal

        </button>

    </a>


</form>


</body>

</html>