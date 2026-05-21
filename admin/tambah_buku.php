<?php
include "../koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $foto = null;

    if (!empty($_FILES['foto']['name'])) {
        $namaFoto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $ext = strtolower(pathinfo($namaFoto, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];
        if (in_array($ext, $allowed)) {
            $fotoBaru = time() . "_" . $namaFoto;
            $path = "../image/admin/cover/" . $fotoBaru;

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

    $query = mysqli_query($koneksi, " insert into buku(judul_buku,pengarang,penerbit,tahun_terbit,foto) 
VALUES ('$judul','$pengarang','$penerbit','$tahun','$foto')");

    if ($query) {
        echo "<script>
    alert('Data berhasil ditambahkan');
    window.location='index.php?page=data_buku';
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
    <title>Tambah Buku - Perpustakaan</title>
</head>

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Buku</h1>
            <div class="breadcrumb mb-4 ms-5 me-3">
                <span class="breadcrumb-item active">Dashboard / Tambah Data Buku</span>
            </div>

            <div class="card mb-4 ms-5 me-3">
                <div class="card-header">
                    <i class="fa-solid fa-plus me-1"></i> Form Tambah Data Buku Perpustakaan
                </div>

                <div class="card-body">

                    <form method="POST" action="tambah_buku.php" enctype="multipart/form-data">

                        <div class="form-floating mb-3">
                            <input type="text" name="judul_buku" class="form-control" required>
                            <label for="inputName">Judul Buku</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="pengarang" class="form-control" required>
                            <label for="inputPenulis">Penulis</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="penerbit" class="form-control" required>
                            <label for="inputPenerbit">Penerbit</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="tahun_terbit" class="form-control" required>
                            <label for="inputTahun">Tahun Terbit</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="file" name="foto" class="form-control" required accept="image/*">
                            <label for="inputImage">Foto Cover Buku</label>
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
<!-- masih gak nyangka ,ternyata kaga respek -->
</html>