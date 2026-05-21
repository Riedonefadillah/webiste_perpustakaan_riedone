<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman tambah Anggota</title>
</head>

<body>
    <?php
    include '../koneksi.php';
    $id_peminjaman = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tanggal_kembali = $_POST['tgl_kembali'];
    }
    ?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Kembali Peminjaman</h1>
            <div class="breadcrumb mb-4 ms-5 me-3">
                <span class="breadcrumb-item active">Dashboard / Kembali Peminjaman</span>
            </div>

            <div class="card mb-4 ms-5 me-3">
                <div class="card-header">
                    <i class="fa-solid fa-plus me-1"></i> Form Kembali Peminjaman
                </div>

                <div class="card-body">

                    <form method="POST" action="kembali_peminjaman.php?id=<?php echo $id_peminjaman;?>">

                        <div class="form-floating mb-3">
                            <input type="text" name="nama_peminjam" class="form-control" placeholder="Masukkan Nama Peminjam" value="<?php echo $d['nama_anggota'];?>">
                            <label for="inputName">Nama Peminjam</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="judul_buku" id="inputBuku"     class="form-control" required></input>
                            <label for="inputBuku">Judul Buku</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="tgl_peminjaman" id="inputTanggal" class="form-control" placeholder="Masukkan Tanggal Peminjam"></input>
                            <label for="inputBuku">Tanggal Peminjaman</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="tgl_kembali" id="inputTanggalKembali"     class="form-control" required></input>
                            <label for="inputBuku">Tanggal Kembali</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="status" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="pinjam">Pinjam</option>
                                <option value="Kembali">Kembali</option>
                            </select>
                            <label>status</label>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-flex justify-content-between">
                                <input type="submit" class="btn-primary btn-block" value="Kembalikan buku">
                            </div>
                        <div class="mt-4 mb-0">
                             <div class="d-flex justify-content-between">
                                <a href="index.php?page=tampil_peminjaman" class="btn btn-secondary btn-block">Kembali</a>
                            </div>
                         </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </main>
</body>

</html>