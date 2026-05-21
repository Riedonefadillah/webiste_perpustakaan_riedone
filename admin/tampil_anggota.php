<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil anggota - Perpustakaan </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Anggota</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Data Anggota Perpustakaan 
                </div>

                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>nama Anggota</th>
                                <th>alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Foto</th>
                                <th>aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM anggota");
                            $no = 1;

                            while ($data = mysqli_fetch_assoc($query)) {
                                ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_anggota']; ?></td>
                                    <td><?= $data['alamat']; ?></td>
                                    <td><?= $data['jenis_kelamin']; ?></td>

                                    <td>
                                        <img src="../image/anggota/profile/<?= $data['foto']; ?>" width="60">
                                    </td>

                                    <td>
                                        <a href="index.php?page=edit_anggota&id=<?php echo $data['id_anggota']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="../admin/delete_anggota.php?id=<?= $data['id_anggota']; ?>" class="btn btn-danger btn-sm"
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