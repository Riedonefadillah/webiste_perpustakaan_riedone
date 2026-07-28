<?php
    include '../koneksi.php';
    $query_anggota = "SELECT * FROM anggota";
    $result_anggota = mysqli_query($koneksi, $query_anggota);
    $query_buku = "SELECT * FROM buku";
    $result_buku = mysqli_query($koneksi, $query_buku);
    $query_peminjaman = mysqli_query($koneksi, "SELECT peminjaman.id_peminjaman, anggota.nama_anggota, buku.judul_buku,peminjaman.tgl_peminjaman FROM peminjaman INNER JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota INNER JOIN buku ON peminjaman.id_buku = buku.id_buku"); 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_anggota = $_POST['id_anggota'];
        $id_buku = $_POST['id_buku'];
        $tgl_peminjaman = $_POST['tgl_peminjaman'];

        $insert = mysqli_query($koneksi, "INSERT INTO peminjaman (id_anggota, id_buku, tgl_peminjaman) VALUES ('$id_anggota','$id_buku','$tgl_peminjaman')");
        if($insert){
            echo "<script>alert('Data peminjaman Berhasil ditambahkan'); window.location.href = 'index.php?page=tampil_peminjaman';</script>";
        }
    }

?>    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Input peminjaman - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Input Peminjaman</h1>
            <div class="breadcrumb mb-4 ms-5 me-3">
                <span class="breadcrumb-item active">Dashboard / Input Peminjaman</span>
            </div>

            <div class="card mb-4 ms-5 me-3">
                <div class="card-header">
                    <i class="fa-solid fa-plus me-1"></i> Form Tambah Data Buku Perpustakaan
                </div>

                <div class="card-body">

                    <form method="POST" action="input_peminjaman.php" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <select name="id_anggota"  class="form-control" id="inputNamaPeminjaman" required>
                                <option value="">Pilih Nama Peminjaman</option>
                                <?php while ($row = mysqli_fetch_array($result_anggota)){?>
                                    <option value="<?php echo $row['id_anggota']; ?>"><?php echo $row['nama_anggota']; ?></option>
                                <?php } ?>
                            </select>
                            <label for="inputNamaPeminjaman">Nama Peminjaman</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="id_buku"  class="form-control" required>
                                <option value="">Pilih Judul Buku</option>
                                <?php while ($data_buku = mysqli_fetch_array($result_buku)) { ?>
                                    <option  value="<?php echo $data_buku['id_buku']; ?>"><?php echo $data_buku['judul_buku'];?></option>       
                                <?php } ?>  
                            </select>
                            <label for="inputBuku">Judul Buku</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="tgl_peminjaman" class="form-control" required>
                            <label for="inputName">Tanggal Peminjaman</label>
                        </div>

                        

                        <div class="mt-4 mb-0">
                            <div class="d-flex justify-content-between">
                                <input type="submit" class="btn-primary btn-block" value="Input Data">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="../assets/demo/chart-area-demo.js"></script> -->
        <!-- <script src="../assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
</body>
</html>