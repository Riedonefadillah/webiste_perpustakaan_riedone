<?php
    include '../koneksi.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id_anggota = $_POST['id_anggota'];
        $nama_anggota = $_POST['nama_anggota'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        $query = "UPDATE anggota SET nama_anggota='$nama_anggota', alamat='$alamat', jenis_kelamin='$jenis_kelamin' WHERE id_anggota='$id_anggota'";
        $update = mysqli_query($koneksi, $query);
        if($update){
             echo "<script> alert('Data Berhasil diupdate'); window.location.href ='index.php?page=tampil_anggota'; </script>";
        } else {
            echo "<script> alert('Gagal mengupdate data anggota'); </script>";
        }
    }

?>

 <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Anggota</h1>
            <div class="breadcrumb mb-4 ms-5 me-3">
                <span class="breadcrumb-item active">Dashboard / Edit Anggota</span>
            </div>

            <div class="card mb-4 ms-5 me-3">
                <div class="card-header">
                    <i class="fa-solid fa-plus me-1"></i> Form Edit Anggota Perpustakaan
                </div>

                <div class="card-body">
                    <?php
                    include '../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <form method="POST" action="edit_anggota.php" enctype="multipart/form-data">

                        <div class="form-floating mb-3">
                            <input type="hidden" name="id_anggota" class="form-control" value="<?php echo $d['id_anggota']; ?>">
                        </div>

                       <div class="form-floating mb-3">
                            <input type="text" name="nama_anggota" class="form-control" required value="<?php echo $d['nama_anggota']; ?>">
                            <label for="inputName">Nama Lengkap</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="alamat"     class="form-control" required><?php echo $d['alamat']; ?></textarea>
                            <label for="inputAlamat">Alamat</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="jenis_kelamin" class="form-control" required value="<?php echo $d['jenis_kelamin']; ?>">
                                <option value="">-- Pilih --</option>
                                <option value="laki-laki" <?php echo ($d['jenis_kelamin'] == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="perempuan" <?php echo ($d['jenis_kelamin'] == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                            <label>Jenis Kelamin</label>
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