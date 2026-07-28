<?php
include "../koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_anggota = $_POST['nama_anggota'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $foto = null;

    if (!empty($_FILES['foto']['name'])) {
        $namaFoto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $ext = strtolower(pathinfo($namaFoto, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];
        if (in_array($ext, $allowed)) {
            $fotoBaru = time() . "_" . $namaFoto;
            $path = "../image/anggota/profile/" . $fotoBaru;

            if (move_uploaded_file($tmp, $path)) {
                $foto = $fotoBaru;
            } else {
                echo "<script> alert('Gagal mengunggah foto'); </script>";
            }
        } else {
            echo "<script> alert('Format foto tidak valid. Hanya JPG, JPEG, PNG yang diperbolehkan.'); </script>";
            exit;
        }

    }

    $query = mysqli_query($koneksi, " insert into anggota(nama_anggota,alamat,jenis_kelamin,foto) 
VALUES ('$nama_anggota','$alamat','$jenis_kelamin','$foto')");

    if ($query) {
        echo "<script>
    alert('Data berhasil ditambahkan');
    window.location='index.php?page=tampil_anggota';
    </script>";
    } else {
        echo "<script>
    alert('Data gagal ditambahkan');
    </script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman tambah Anggota</title>
</head>

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data anggota</h1>
            <div class="breadcrumb mb-4 ms-5 me-3">
                <span class="breadcrumb-item active">Dashboard / Tambah Data Buku</span>
            </div>

            <div class="card mb-4 ms-5 me-3">
                <div class="card-header">
                    <i class="fa-solid fa-plus me-1"></i> Form Tambah Data Anggota Perpustakaan
                </div>

                <div class="card-body">

                    <form method="POST" action="tambah_anggota.php" enctype="multipart/form-data">

                        <div class="form-floating mb-3">
                            <input type="text" name="nama_anggota" class="form-control" required>
                            <label for="inputName">Nama Lengkap</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="alamat"     class="form-control" required></textarea>
                            <label for="inputAlamat">Alamat</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            <label>Jenis Kelamin</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" name="foto" class="form-control" required accept="image/*">
                            <label for="inputImage">Foto</label>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-flex justify-content-between">
                                <input type="submit" class="btn-primary btn-block" value="Tambah Data">
                                <input type="reset" class="btn btn-danger btn-block" value="Reset Data">
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </main>
</body>

</html>