<?php
    include '../koneksi.php';
    
    $id = $_GET['id'] ?? '';

    $data = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
    $data_edit = mysqli_fetch_array($data);

    $query_anggota = "SELECT * FROM anggota";
    $result_anggota = mysqli_query($koneksi, $query_anggota);

    $query_buku = "SELECT * FROM buku";
    $result_buku = mysqli_query($koneksi, $query_buku);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_peminjaman = $_POST['id_peminjaman']; 
        $id_anggota = $_POST['id_anggota'];
        $id_buku = $_POST['id_buku'];
        $tgl_peminjaman = $_POST['tgl_peminjaman'];

        $update = mysqli_query($koneksi, "UPDATE peminjaman SET id_anggota='$id_anggota', id_buku='$id_buku', tgl_peminjaman='$tgl_peminjaman' WHERE id_peminjaman='$id_peminjaman'");
        
        if($update){
            echo "<script>alert('Data peminjaman Berhasil diupdate'); window.location.href = 'index.php?page=tampil_peminjaman';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate data peminjaman');</script>";
        }
    }
?>    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel=\"stylesheet\" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Peminjaman</h1>
            <div class="breadcrumb mb-4 ms-5 me-3">
                <span class="breadcrumb-item active">Dashboard / Edit Peminjaman</span>
            </div>

            <div class="card mb-4 ms-5 me-3">
                <div class="card-header">
                    <i class="fa-solid fa-pen-to-square me-1"></i> Form Edit Peminjaman Perpustakaan
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        
                        <input type="hidden" name="id_peminjaman" value="<?php echo $data_edit['id_peminjaman']; ?>">

                        <div class="form-floating mb-3">
                            <select name="id_anggota" class="form-control" required>
                                <option value="">-- Pilih Anggota --</option>
                                <?php while($row_anggota = mysqli_fetch_array($result_anggota)) { 
                                    // Jika ID Anggota dari database sama dengan data di looping, otomatis beri tanda 'selected'
                                    $selected = ($row_anggota['id_anggota'] == $data_edit['id_anggota']) ? 'selected' : '';
                                ?>
                                    <option value="<?= $row_anggota['id_anggota']; ?>" <?= $selected; ?>>
                                        <?= $row_anggota['nama_anggota']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <label for="inputAnggota">Nama Anggota</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="id_buku" class="form-control" required>
                                <option value="">-- Pilih Buku --</option>
                                <?php while($row_buku = mysqli_fetch_array($result_buku)) { 
                                    // Jika ID Buku dari database sama dengan data di looping, otomatis beri tanda 'selected'
                                    $selected = ($row_buku['id_buku'] == $data_edit['id_buku']) ? 'selected' : '';
                                ?>
                                    <option value="<?= $row_buku['id_buku']; ?>" <?= $selected; ?>>
                                        <?= $row_buku['judul_buku']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <label for="inputBuku">Judul Buku</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="tgl_peminjaman" class="form-control" required value="<?php echo $data_edit['tgl_peminjaman']; ?>">
                            <label for="inputTanggal">Tanggal Peminjaman</label>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-flex justify-content-between">
                                <input type="submit" class="btn btn-primary btn-block" value="Update Data">
                                <input type="reset" class="btn btn-danger btn-block" value="Reset Data">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>