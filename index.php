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
                <li><a href="#section2"> CONTACT </a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
            <i class='bx bx-sun' id="lightMode"></i>
        </nav>
            <content>
                <img src="https://img.freepik.com/premium-photo/falling-broken-chocolate-chip-cookies-isolated-white-with-clipping-path_88281-2863.jpg?w=826" alt="gambar Cookies" class="content-item">
                <h1 id="textGambar">
                    <span class="CenterText"> Sweet Cookies <br> for <br> Your Sweet Smile. </span>
                </h1>
                <div id="section1">
                    <h3> Our Product </h3>
                    <div class="product">
                        <div>
                            <img src="https://img.freepik.com/free-photo/pile-cookies-coffee-front-view_23-2148654554.jpg?w=740&t=st=1664118129~exp=1664118729~hmac=9c1fcd4b683d60379972111e4fbda0872909bf1be57be2c7ea770886f0593ea1" alt="gambar cookies"> 
                            <p> Chococips Cookie </p>
                            <p1> Rp 20.000,- </p1>
                        </div>
                        <div>
                            <img src="https://img.freepik.com/free-photo/pile-cookies-coffee-front-view_23-2148654554.jpg?w=740&t=st=1664118129~exp=1664118729~hmac=9c1fcd4b683d60379972111e4fbda0872909bf1be57be2c7ea770886f0593ea1" alt="gambar cookies"> 
                            <p> Chococips Cookie </p>
                            <p1> Rp 20.000,- </p1>
                        </div>
                        <div>
                            <img src="https://img.freepik.com/free-photo/pile-cookies-coffee-front-view_23-2148654554.jpg?w=740&t=st=1664118129~exp=1664118729~hmac=9c1fcd4b683d60379972111e4fbda0872909bf1be57be2c7ea770886f0593ea1" alt="gambar cookies"> 
                            <p> Chococips Cookie </p>
                            <p1> Rp 20.000,- </p1>
                        </div>
                    </div>
                    <div class="buttonsec1"><span> MORE PRODUCT </span></div>
                </div>
                <div id="section2">
                    <h3> Have A Question? </h3>
                    <div class="form">
                        <p1 id="Qform">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p1>
                        <form action="Output.php" method="get" name="question">
                            <input type="text" placeholder="Name" name="Name"> 
                            <input type="number" placeholder="Phone" name="Phone">
                            <input type="email" placeholder="Email" name="Email">
                            <textarea placeholder="Message" name="Message"></textarea>
                            <input type="date" placeholder="Date" name="Date"><br><br>
                            <input type="submit" value="Submit" name="question" onclick="popUpBox()">
                        </form>
                    </div>
                    <div class="contact">
                        <h2> Contact Me 📞</h2>
                        <p1> Telp: 0812-3456-78910 <br> Email: info@my-domian.com </p1><br><br>
                        <h2> Opening Hours 🕖</h2>
                        <p1 class="schedule"> Monday-Friday: 7am - 10 pm </p1><br>
                        <p1 class="schedule"> Saturday-Sunday: 8am - 11pm </p1>
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