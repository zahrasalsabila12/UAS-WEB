<?php

include "../connector.php";

    $idProduk = $_GET['id'];

    if(isset($_POST['update'])){
        $namaProduk = $_POST['namaProduk'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];
        $tableGambar = mysqli_query($connect, "SELECT * FROM detailproduk WHERE id='$idProduk'");
        $rowGambar = mysqli_fetch_array($tableGambar);
        $fileLama = $rowGambar['gambar'];
        unlink('../img/'.$fileLama);
        
        if(!empty($_FILES['gambar']['name'])){
            $query = mysqli_query($connect,"SELECT * FROM detailproduk WHERE namaProduk='$namaProduk'");
            $result = mysqli_fetch_assoc($query);
            $id = $result['id'];
            $nama = $_POST['nama_gambar'];
            $waktu = $_POST['waktu'];
            $gambar = $_FILES['gambar']['name'];
            $x = explode('.',$gambar);
            $ekstensi = strtolower(end($x));
            $gambar_baru = "$nama.$ekstensi";
            $tmp = $_FILES['gambar']['tmp_name'];
            if(move_uploaded_file($tmp,"../img/$gambar_baru")){
                $query = mysqli_query($connect, "UPDATE detailproduk SET namaProduk='$namaProduk', gambar='$gambar_baru', harga='$harga', tanggal='$tanggal' WHERE id='$idProduk'");
                
                if($query){
                    echo"Data Berhasil di Update";
                    header("location:index.php");
                } else {
                    echo"Data Gagal di Update";
                }
            }
        }
    }
    
    $tableGambar = mysqli_query($connect, "SELECT * FROM detailproduk WHERE id='$idProduk'");
    $rowGambar = mysqli_fetch_array($tableGambar);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title> Admin </title>
    <link rel="icon" href="../Logo-Salsa Cookies.png">
    <link rel="stylesheet" href="../style.css">
    <script src="../javascript.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        h3{
            padding-top: 50px;
            font-size: 32px;
        }
        table th {
            text-align: center;
            background-color: #ffdb4f;
            color: black;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 10%;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid black;
        }
        table td, table th {
            background-color: #B09B71;
            border: 1px solid black;
            padding: 6px;
            width: 100px;
        }
        table tr td a {
            color: white;
        }
	</style>   
</head>
<body class=body>
    <!-- Header -->
    <header>
        <h1> <img src="../Logo Salsa Cookies.png" alt="Logo" width="60" height="60"> <br> Salsa Cookies </h1>
    </header>
    <!-- Nav bar -->
    <nav class="navigator">
        <ul>
            <li><a href="../index.php"> HOME </a></li>
            <li><a href="produk/index.php"> PRODUCT </a></li>
            <li><a href="#"> SUGGESTION </a></li>
            <li><a href="../About Me.html"> ABOUT ME </a><li>
            <li><a href="../index.php#section2"> ORDER </a></li>
            <li><a href="../logout.php"> Logout </a></li>
        </ul>
        <i class='bx bx-sun' id="lightMode"></i>
    </nav>
    <section class="center">
            <form action="" method="POST" enctype="multipart/form-data" class="box">
            <h3 align="center"> UPDATE PRODUCT</h3>
                <table border="0" align="center">
                    <tr>
                        <td>Nama Produk</td>
                        <td><input type="text" name="namaProduk" placeholder="Masukkan Nama Barang" value="<?= $rowGambar['namaProduk'] ?>"required></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="number" name="harga" placeholder="Masukkan Harga Barang" value="<?= $rowGambar['harga'] ?>"required></td>
                    </tr>
                    <tr>
                        <td>Nama Gambar</td>
                        <td><input type="text" name="nama_gambar" placeholder="Masukkan Nama Gambar" value="<?= $rowGambar['gambar'] ?>"required></td>
                    </tr>
                    <tr>
                        <td>File</td>
                        <td><input type="file" name="gambar" value="<?=$rowGambar['gambar']?>"required></td>
                        <input type="datetime"  value="<?php echo date("Y-m-d\TH:i:s", $timestamp); ?>" hidden name="tanggal">
                    </tr>

                    <tr>
                        <td align="center" colspan="2"><hr><input type="submit" name="update" value="Update"></td>
                    </tr>
                </table>
            </form>
        </section>
        <footer>
            <div class="footer">
                <img src="../Logo-Salsa Cookies.png" alt="Logo"> 
                <h3> Salsa Cookies. </h3>
                <ul>
                    <li> <a href="About Me.html"> 👥 About Me </a></li>
                    <li> <a href="#section2"> 📞 Contact Me </a></li>
                </ul>
                <br>
            </div>
        </footer>
        <h5 class="bottom"> ©Copyright2022-Zahra Salsabila </h5> 
</body>
</html>