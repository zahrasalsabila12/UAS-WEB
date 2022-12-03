<?php
//  session_start();
 include 'connector.php';
 if(!isset($_SESSION['login'])){
    header("location:login.php");
    exit;
 }
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <title> Admin </title>
        <link rel="icon" href="Logo-Salsa Cookies.png">
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js" defer></script>
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    </head>
    <body>
        <!-- Header -->
        <header>
            <h1> <img src="Logo Salsa Cookies.png" alt="Logo" width="60" height="60"> <br> Salsa Cookies </h1>
        </header>
        <!-- Nav bar -->
        <nav class="navigator">
            <ul>
                <li><a href="index.php"> HOME </a></li>
                <li><a href="produk/index.php"> PRODUCT </a></li>
                <li><a href="#"> SUGGESTION </a></li>
                <li><a href="#section2"> ORDER </a></li>
                <li><a href="logout.php"> Logout </a></li>
            </ul>
            <i class='bx bx-sun' id="lightMode"></i>
        </nav>
        <content>
                <img src="https://img.freepik.com/premium-photo/falling-broken-chocolate-chip-cookies-isolated-white-with-clipping-path_88281-2863.jpg?w=826" alt="gambar Cookies" class="content-item">
                <h1 id="textGambar">
                    <span class="CenterText"> Sweet Cookies <br> for <br> Your Sweet Smile. </span>
                </h1>
            <div id="section2">
                <h3> Form Pemesanan </h3>
                <div class="form">
                    <form>
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Product Name">
                        <input type="number" placeholder="Order Quantity">
                        <input type="number" placeholder="Phone">
                        <input type="email" placeholder="Email">
                        <textarea placeholder="Address"></textarea>
                        <input type="date" placeholder="Order Date"><br><br>
                        <input type="submit" value="Submit" name="question" onclick="popUpBox2()">
                    </form>
                </div>
        </content>
        <footer>
            <div class="footer">
                <img src="Logo-Salsa Cookies.png" alt="Logo"> 
                <h3> Salsa Cookies. </h3>
                <ul>
                    <li> <a href="About Me.html"> 👥 About Me </a></li>
                    <li> <a href="#"> 📞 Contact Me </a></li>
                </ul>
                <br>
            </div>
        </footer>
        <h5 class="bottom"> ©Copyright2022-Zahra Salsabila </h5> 
    </body>
    
</html>