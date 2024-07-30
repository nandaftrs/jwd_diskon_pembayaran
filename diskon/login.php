<?php 
    include_once("koneksi.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <!-- Navbar start-->
    <nav class="navbar">
    <a href="#" class="navbar-logo">sey<span>mart</span>.</a>
    
    <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="https://www.instagram.com/wxlliamj.mnf" target="_blank">Kontak</a>
    </div>
    </nav>
    <!-- Navbar end-->
    <?php
        if($_POST)
        {
            $username = $_POST['username'];
            $password = sha1($_POST['password']);

            $sql = "SELECT * FROM tabel_user WHERE username = '$username' AND password = '$password'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION ['sudahLogin'] = true;
                header('Location: index.php');
            } else {
                header('Location: login.php');
            }
        }
    ?>
    <div class="main-container">
        <section class="panel-form">
            <h1>User Login</h1>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <input type="submit" value="Login">
            </form>
        </section>
    </div> <!--end main container-->
    <footer>
        <p class="line1">&copy; 2024 SeyMart. All rights reserved.</p>
        <p>Made By &copy; Nanda F</p>
    </footer>
    
</body>
</html>