<?php
    include '../koneksi.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id_buku = $_POST['id_buku'];
        $judul = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];

        $query = "UPDATE buku SET judul_buku='$judul', pengarang='$pengarang', penerbit='$penerbit',tahun_terbit='$tahun_terbit' WHERE id_buku='$id_buku'";
        $update = mysqli_query($koneksi, $query);
        if($update){
             echo "<script> alert('Data Berhasil diupdate'); window.location.href ='index.php?page=data_buku'; </script>";
        } else {
            echo "<script> alert('Gagal mengupdate data buku'); </script>";
        }
    }

?>

 <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Buku</h1>
            <div class="breadcrumb mb-4 ms-5 me-3">
                <span class="breadcrumb-item active">Dashboard / Edit Buku</span>
            </div>

            <div class="card mb-4 ms-5 me-3">
                <div class="card-header">
                    <i class="fa-solid fa-plus me-1"></i> Form Edit Buku Perpustakaan
                </div>

                <div class="card-body">
                    <?php
                    include '../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <form method="POST" action="edit_buku.php" enctype="multipart/form-data">

                        <div class="form-floating mb-3">
                            <input type="hidden" name="id_buku" class="form-control" value="<?php echo $d['id_buku']; ?>">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="judul_buku" class="form-control" required value="<?php echo $d['judul_buku'];?>">
                            <label for="inputName">Judul Buku</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="pengarang" class="form-control" required value="<?php echo $d['pengarang'];?>">
                            <label for="inputPenulis">Penulis</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="penerbit" class="form-control" required value="<?php echo $d['penerbit'];?>">
                            <label for="inputPenerbit">Penerbit</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="tahun_terbit" class="form-control" required value="<?php echo $d['tahun_terbit'];?>">
                            <label for="inputTahun">Tahun Terbit</label>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-flex justify-content-between">
                                <input type="submit" class="btn-primary btn-block" value="Update Data">
                                <input type="reset" class="btn btn-danger btn-block" value="Reset Data">
                            </div>

                        </div>

                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>