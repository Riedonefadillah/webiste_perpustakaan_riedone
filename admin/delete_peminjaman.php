<?php
include '../koneksi.php';

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

}
?>