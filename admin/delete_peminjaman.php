<?php
include '../koneksi.php';

<<<<<<< HEAD
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $from = $_GET['from'];

    $delete = mysqli_query($koneksi,
        "DELETE FROM peminjaman WHERE id_peminjaman='$id'");

    if($delete){

        if($from == "pinjam"){
            echo "<script>
                alert('Data berhasil dihapus');
                window.location='index.php?page=tampil_peminjaman';
            </script>";
        }else{
            echo "<script>
                alert('Data berhasil dihapus');
                window.location='index.php?page=tampil_kembali';
            </script>";
        }

    }else{
        echo "<script>
            alert('Gagal menghapus data');
            history.back();
        </script>";
    }

=======
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
    $data = mysqli_fetch_assoc($query);

    if($data){
        $delete = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_peminjaman='$id' ");

        if($delete){
            echo "<script>alert('Data berhasil dihapus'); window.location='index.php?page=tampil_peminjaman';</script>";
        }
        else {
            echo "<script>alert('Gagal menghapus data'); window.location='index.php?page=tampil_peminjaman';</script>";
        }
    } 
>>>>>>> 04c95f79c29a81c0e83b705a3d30d41ee6923e1f
}
?>