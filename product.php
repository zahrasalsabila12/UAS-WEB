<?php
    include "connector.php";
    $database_name = "produk";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["belanja"])){
            $item_array_id = array_column($_SESSION["belanja"],"id_produk");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["belanja"]);
                $item_array = array(
                    'id_produk' => $_GET["id"],
                    'nama_produk' => $_POST["hidden_name"],
                    'harga_produk' => $_POST["hidden_price"],
                    'jumlah_barang' => $_POST["quantity"],
                );
                $_SESSION["belanja"][$count] = $item_array;
                echo '<script>window.location="product.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="product.php"</script>';
            }
        }else{
            $item_array = array(
                'id_produk' => $_GET["id"],
                'nama_produk' => $_POST["hidden_name"],
                'harga_produk' => $_POST["hidden_price"],
                'jumlah_barang' => $_POST["quantity"],
            );
            $_SESSION["belanja"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["belanja"] as $keys => $value){
                if ($value["id_produk"] == $_GET["id"]){
                    unset($_SESSION["belanja"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="product.php"</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <title> Salsa Cookies </title>
        <link rel="icon" href="Logo Salsa Cookies.png">
        <link rel="stylesheet" href="Style.css">
        <script src="javascript.js" defer></script>
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #EDDFB3;

        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #EDDFB3;

            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #EDDFB3;

            padding: 2%;
        }
        table th{
            background-color: #EDDFB3;

        }
        </style>
    </head>
    <body>
        <!-- Header -->
        <header>
            <h1> <img src="Logo Salsa Cookies.png" alt="Logo" width="60" height="60"> <br> Salsa Cookies </h1>
        </header>
        <!-- Nav bar -->
        <nav class="navigator">
            <ul>
                <li><a href="index.php "> HOME </a></li>
                <li><a href="product.php"> SHOP </a></li>
                <li><a href="About Me.html"> ABOUT ME </a></li>
                <li><a href="index.php#section2"> CONTACT </a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
            <i class='bx bx-sun' id="lightMode"></i>
        </nav>
            <content>
               <div class="container">
                <h2>Our Product</h2>
                <?php
                    $query =  "SELECT * FROM detailProduk ORDER BY id ASC";
                    $hasil = mysqli_query($con, $query);

                    if(mysqli_num_rows($hasil) > 0){
                        $produk = [];
                        while ($baris = mysqli_fetch_array($hasil)) {
                            $produk[] = $rowProduk;
                            ?>
                            <div class="col-md-3">
                                <form method="post" action="product.php?action">
                                    <div class="produk">
                                        <img width="100px" src="../img/<?=$rowProduk['gambar']?>" alt="<?=$rowProduk['gambar']?>" class="img-responsive">
                                        <h5 class="text-info"><?php echo $baris["namaProduk"]; ?></h5>
                                        <h5 class="text-danger" ><?php echo $baris["harga"]; ?></h5>
                                        <input type="text" name="quantity" class="form-control" value="1">
                                        <input type="hidden" name="hidden_name" value="<?php echo $baris["namaProduk"]; ?>">
                                        <input type="hidden" name="hidden_price" value="<?php echo $baris["harga"]; ?>">
                                        <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                                    </div>
                                </form>
                            </div>
                            <?php
                        }
                    }
                ?>
                <div style="clear: both"></div>
                <h3 class="title2">Detail Pembelian</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama Produk</th>
                            <th width="10%">Jumlah</th>
                            <th width="13%">Detail Harga</th>
                            <th width="10%">Total Harga</th>
                            <th width="17%">Hapus Barang</th>
                        </tr>

                        <?php
                        if(!empty($_SESSION["belanja"])){
                            $total = 0;
                            foreach ($_SESSION["belanja"] as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value["nama_produk"]; ?></td>
                                <td><?php echo $value["jumlah_barang"]; ?></td>
                                <td>$<?php echo $value["harga_produk"]; ?></td>
                                <td>
                                    $<?php echo number_format($value["jumlah_barang"] * $value["harga_produk"], 2); ?></td>
                                <td><a href="product.php?action=delete&id=<?php echo $value["id_produk"]; ?>"><span
                                        class="text-danger">Hapus Barang</span></a></td>
                            </tr>
                        <?php
                            $total = $total + ($value["jumlah_barang"] * $value["harga_produk"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right"><?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                        ?>
                    </table>
               </div>
            </div>
            </content>
        <footer>
            <img src="Logo-Salsa Cookies.png" alt="Logo"> 
            <h3> Salsa Cookies. </h3>
            <ul>
                <li> <a href="About Me.html"> 👥 About Me </a></li>
                <li> <a href="#section2"> 📞 Contact Me </a></li>
            </ul>
            <br>
        </footer>
        <h5 class="bottom"> ©Copyright2022-Zahra Salsabila </h5>
    </body>
</html>