<?php
include '../koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
    $data = mysqli_fetch_assoc($query);

    if($data){
        $delete = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id' ");

        if($delete){
            echo "<script>alert('Data berhasil dihapus'); window.location='index.php?page=data_buku';</script>";
        }
        else {
            echo "<script>alert('Gagal menghapus data'); window.location='index.php?page=data_buku';</script>";
        }
    } 
}
?>