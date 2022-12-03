<?php 
    include "../connector.php";
    $timestamp = time();

    if(isset($_POST['create'])){
        $namaProduk = $_POST['namaProduk'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];

        if(!empty($_FILES['images']['name'])){
          $query = mysqli_query($connect,"SELECT * FROM detailproduk WHERE namaProduk='$namaProduk'");
          $result = mysqli_fetch_assoc($query);
          $id = $result['id'];
          $nama = $_POST['nama_gambar'];
          $gambar = $_FILES['images']['name'];
          $x = explode('.',$gambar);
          $ekstensi = strtolower(end($x));
          $gambar_baru = "$nama.$ekstensi";
          $tmp = $_FILES['images']['tmp_name'];
          if(move_uploaded_file($tmp,"../img/$gambar_baru")){
              $query = mysqli_query($connect, "INSERT INTO detailproduk ( namaProduk, gambar, harga, tanggal) VALUES ('$namaProduk', '$gambar_baru', '$harga', '$tanggal')");
            if($query){
            echo"Data Berhasil di Tambah";
              header("Location:index.php");
            } else {
              echo "Tambah data error";
            }
          }
        }
      }
      

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
    		width: 2px;
        }          
        table tr td a {
            color: white;
        }
        tr a{
            text-decoration: none;
        }
	</style>    
</head>
<body class="body">
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
        <form action="" method="POST"  enctype="multipart/form-data" class="box">
            <h3 align="center"> ADD PRODUK </h3>
            <table border="0" align="center">
                <tr>
                    <td>Nama Produk</td>
                    <td><input type="text" name="namaProduk" required></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="number" name="harga" required></td>
                </tr>
                <tr>
                    <td>Nama File</td>
                    <td><input type="text" name="nama_gambar" required></td>
                </tr>
                <tr>
                    <td>File</td>
                    <td><input type="file" name="images" required></td>
                    <input type="datetime" value="<?php echo date("Y-m-d\TH:i:s", $timestamp); ?>" hidden name="tanggal">
                </tr>

                <tr>
                    <td align="center" colspan="2"><hr><input type="submit" name="create" value="ADD"> <a href="index.php">BACK</a></td>
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