<?php
    include "connector.php";

    $idProduk = $_GET['id'];

    $tableGambar = mysqli_query($connect, "SELECT * FROM detailproduk WHERE id='$idProduk'");
    $rowGambar = mysqli_fetch_array($tableGambar);
    $fileLama = $rowGambar['gambar'];
    unlink('../img/'.$fileLama);
    $query1 = mysqli_query($connect, "DELETE FROM detailproduk WHERE id='$idProduk'");
        
        if($query && $query1){
            echo"Data Berhasil di Delete";
            header("location:produk.php");
        } else {
            echo"Data Gagal di Delete";
            header("location:produk.php");
        }
?>