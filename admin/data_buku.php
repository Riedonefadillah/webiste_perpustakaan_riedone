<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil buku - Perpustakaan </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Buku</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Buku
                </div>

                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM buku");
                            $no = 1;

                            while ($data = mysqli_fetch_assoc($query)) {
                            ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['judul_buku']; ?></td>
                                    <td><?= $data['pengarang']; ?></td>
                                    <td><?= $data['penerbit']; ?></td>
                                    <td><?= $data['tahun_terbit']; ?></td>

                                    <td>
                                        <img src="../image/admin/cover/<?= $data['foto']; ?>" width="60">
                                    </td>

                                    <td>
                                        <a href="index.php?page=edit_buku&id=<?php echo $data['id_buku'];?>" class="btn btn-warning btn-sm">Edit</a>

                                        <a href="../admin/delete_buku.php?id=<?= $data['id_buku']; ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
                                    </td>
                                    

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