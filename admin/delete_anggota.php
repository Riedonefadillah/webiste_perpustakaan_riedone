<?php
include '../koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
    $data = mysqli_fetch_assoc($query);

    if($data){
        $delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$id' ");

        if($delete){
            echo "<script>alert('Data berhasil dihapus'); window.location='index.php?page=tampil_anggota';</script>";
        }
        else {
            echo "<script>alert('Gagal menghapus data'); window.location='index.php?page=tampil_anggota';</script>";
        }
    } else{
         echo "<script>alert('Data tidak ditemukan'); window.location='index.php?page=tampil_anggota';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid'); window.location='index.php?page=tampil_anggota';</script>";
}
?>