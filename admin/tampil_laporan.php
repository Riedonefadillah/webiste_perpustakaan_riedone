<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Tampil Laporan - Perpustakaan </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
    @media print {
        #cetak {
            display:none;
        }
    }
</style>
</head>
<body>
<div class="container-fluid px-4">   
<h1 class="mt-4">Tampil Laporan Perpustakaan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard / Tampil Laporan</li>         
        </ol>
        <div class="card mb-4">     
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Laporan Peminjaman Perpustakaan
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include '../koneksi.php';

                        $no =1;
                        $query = mysqli_query($koneksi, "SELECT peminjaman.*, anggota.nama_anggota, buku.judul_buku FROM peminjaman INNER JOIN anggota ON anggota.id_anggota = peminjaman.id_anggota INNER JOIN buku ON buku.id_buku = peminjaman.id_buku");
                        while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nama_anggota'];?></td>
                            <td><?php echo $data['judul_buku']; ?></td>
                            <td><?php echo $data['tgl_peminjaman']; ?></td>
                            <td><?php echo $data['tgl_kembali']; ?></td>
                            <td><?php echo $data['status'];?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <a id="cetak" class="btn btn-primary" target="_blank">Cetak Laporan </a>
                <script>
                   const cetak = document.getElementById('cetak');
                   cetak.addEventListener('click', function(){
                    window.print();
                   });
                </script>
            </div>
</div> 
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
            <script src="../js/datatables-simple-demo.js"></script>
            <script src="js/scripts.js"></script>
</body>
</html>