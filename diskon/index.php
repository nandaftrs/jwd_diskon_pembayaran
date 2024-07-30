<?php
    session_start();

    if (!isset($_SESSION["sudahLogin"])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pembayaran</title>

    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,100;1,700&display=swap"
         rel="stylesheet"
    />
</head>
<body>

    <!-- Navbar start-->
    <nav class="navbar">
        <a href="#" class="navbar-logo">sey<span>mart</span>.</a>
    
        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#contact">Kontak</a>
        </div>
    </nav>
    <!-- Navbar end-->
    <div class="main-container">
        <section class="panel-form">
            <h1>Hitung Pembayaran</h1>
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="total_belanja">Total Belanja:</label>
                    <input type="text" name="total_belanja" id="total_belanja" placeholder="Masukan Total Belanja..." required>
                </div> <!-- end form-group -->
    
                <input type="submit" value="Hitung">
            </form>
        </section> <!--end panel-form-->
        <?php
    
            function hitung_discount($total_belanja)
            {
                $discount = 0;
                if ($total_belanja >= 100000) {
                    $discount = $total_belanja * 0.1;
                } else if ($total_belanja >= 50000) {
                    $discount = $total_belanja * 0.05;
                }
    
                return $discount;
            }
    
            if($_POST) {
                $total_belanja = $_POST['total_belanja'];
                $nilai_discount = hitung_discount($total_belanja);
                
                $bayar = $total_belanja - $nilai_discount;
                
                echo "<section class='panel-info'>";
                    echo "<div class='info-belanja'>";
                        echo "<p>Total Belanja</p>";
                        echo "<p>" . $total_belanja ."</p>";
                        echo "</div>";
    
                    echo "<div class='info-discount'>";
                        echo "<p>Discount</p>";
                        echo "<p>". $nilai_discount ."</p>";
                    echo "</div>";
                    
                    echo "<div class='info-bayar'>";
                        echo "<p>Total Bayar</p>";
                        echo "<p>". $bayar ."</p>";
                    echo "</div>";
                echo "</section>";
            }
            ?>
    <a href="logout.php">Logout</a>
    
    </div> <!-- end main container-->
    <footer>
        <p>&copy; 2024 SeyMart. All rights reserved.</p>
        <p>Made By &copy; Nanda F</p>
    </footer>
</body>
</html>