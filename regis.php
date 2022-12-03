<?php 
include 'connector.php';
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm-pass'];

    if($password === $cpassword){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo "<script>
            alert('Username Sudah digunakan');
            document.location.href = 'regis.php';
            </script>";
        }else {
            $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($connect, $sql);
            if(mysqli_affected_rows($connect) > 0) {
                echo "<script>
                alert('Registrasi Telah Berhasil');
                document.location.href ='login.php';
                </script>";
            } else{
                echo "<script>
                alert('Registrasi Gagal!!!');
                document.location.href ='login.php';
                </script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="Logo-Salsa Cookies.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        body {
            background-color: #87805E;
            font-family: 'Poppins', sans-serif;
        }
        .regis-form{
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 500px;
            background-color: #EDDFB3;
            padding: 20px;
            border-radius: 8px;
            box-sizing : border-box;
            margin: auto;
            margin-top: 65px;
        }
        h1{
            font-size: 36px;
            font-weight: 100;
            text-align: center;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 10px;
            margin-bottom: 16px;
            resize: vertical;
        }
        button[type=submit] {
            background-color: #87805E;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="regis-form">
        <h1>Registration</h1>
        <form method="POST">
            <div>
                <label for="username"><b>Username</b></label>
                <br>
                <input type="text" name="username" id="username" placeholder="Enter Username" required>
                <br>
                <label for="password"><b>Password</b></label>
                <br>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
                <br>
                <label for="confirm-pass"><b>Confirm Password</b></label>
                <br>
                <input type="password" placeholder="Confirm Password" name="confirm-pass" id="confirm-pass" required>
                <br>
                <button type="submit" name="register" id="register">Register</button>
                <p>Already have an account? <a href="login.php">Sign in</a></p>
            </div>
        </form>
    </div>
</body>
</html>