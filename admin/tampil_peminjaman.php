<?php
// include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Peminjaman - Perpustakaan </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Peminjaman</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Peminjaman
                </div>

                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            include '../koneksi.php';
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT peminjaman.*, anggota.nama_anggota, buku.judul_buku FROM peminjaman INNER JOIN anggota ON anggota.id_anggota = peminjaman.id_anggota INNER JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.status = 'pinjam'");

                            while ($data = mysqli_fetch_array($query)) {
                            ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_anggota']; ?></td>
<<<<<<< HEAD
                                    <td><?= $data['judul_buku']?></td>
=======
                                    <td><?= $data['judul_buku']; ?></td>
>>>>>>> 04c95f79c29a81c0e83b705a3d30d41ee6923e1f
                                    <td><?= $data['tgl_peminjaman']; ?></td>

                                    

                                    <td>
<<<<<<< HEAD
                                        <a href="index.php?page=edit_peminjaman&id= <?= $data['id_peminjaman']; ?>" class="btn btn-warning btn-sm">Edit</a>

                                        <a href="../admin/delete_peminjaman.php?id=<?= $data['id_peminjaman']; ?>&from=pinjam" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>

                                        <a href="index.php?page=kembali_peminjaman&id=<?php echo $data['id_peminjaman'];?>" class="btn btn-primary btn-sm">Kembali</a>
                                    </td>
=======
                                        <a href="index.php?page=edit_peminjaman&id=<?php echo $data['id_peminjaman'];?>" class="btn btn-warning btn-sm">Edit</a>

                                        <a href="../admin/delete_peminjaman.php?id=<?= $data['id_peminjaman']; ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>

                                        <a href="index.php?page=kembali&id=<?php echo $data['id_peminjaman'];?>" class="btn btn-primary btn-sm">Kembali</a>
                                    </td>

>>>>>>> 04c95f79c29a81c0e83b705a3d30d41ee6923e1f
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>

</body>

</html>