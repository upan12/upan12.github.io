<?php
$server="localhost";
$dbusername="root";
$dbpassword="";
$dbname="em";

$conn = mysqli_connect($server,$dbusername,$dbpassword,$dbname);

if (!($conn)) 'koneksi gagal dilakukan';
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-
    scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->

    <!-- fontawesome new -->
    <link rel="stylesheet" type="text/css" href="../fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <!-- lineawesome new -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="style-adminn.css">

    <title>Admin</title>
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <section class="sidebar">
        <div class="sidebar-brand">
            <h2><span><i class="fa-brands fa-accusoft"></i></span>
                <span>E - Market</span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="text">Dashboard</span></a>
                </li>
                <li>
                    <a href="#"><span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <span class="text">Seller</span></a>
                </li>
                <li>
                    <a href="#"><span class="icon"><i class="fa-solid fa-box" aria-hidden="true"></i></span>
                        <span class="text">Product</span></a>
                </li>
                <!-- <li>
                    <a href=""><span class="icon"><i class="fa fa-comments" aria-hidden="true"></i></span>
                        <span class="text">Messages</span></a>
                </li> -->
                <li>
                    <a href=""><span class="icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <span class="text">Help</span></a>
                </li>
                <li>
                    <a href=""><span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                        <span class="text">Setting</span></a>
                </li>
                <!-- <li>
                    <a href=""><span class="icon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                        <span class="text">Accounts</span></a>
                </li> -->
                <li>
                    <a href="logout.php"><span class="icon"><i class="fa-solid fa-arrow-right-to-bracket"></i></span>
                        <span class="text">Sign Out</span></a>
                </li>
            </ul>
        </div>
    </section>

    <section class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="fas fa-bars"></span>
                </label>

                Dashboard
            </h2>

        <form action="" method="GET"></form>
            <div class="search-wrapper">
                <span class="las la-search" aria-hidden="true"></span>
                <input type="search" name="box" placeholder="Search...">
            </div>
    </form>
            <!-- search -->
    <tbody>
                                        <?php 
                                        // Bikin Variable Query
                                            $no = 1;
                                            $qrec = mysqli_query($conn, "SELECT * FROM produk");
                                        
                                        // Tampilkan Data
                                        if (isset($_GET['box']))
                                        {
                                            $keyword = $_GET['box'];
                                            $qrec = mysqli_query($conn,"SELECT * FROM produk  WHERE nama_produk LIKE '%keyword%'");
                                        } 
                                            while ($rec = mysqli_fetch_array($qrec)){
                                        ?>
                                    <tr>
                                        <td><?= $rec['nama_produk']?></td>
                                        <td><?= $rec['harga']?></td>
                                        <td><?= $rec['stok']?></td>
                                        <td><?= $rec['deskripsi']?></td>
                                    </tr>
                                        <?php $no++; } ?>

                                </tbody>
    <!-- penutup search --> 

            <div class="user-wrapper">
                <img src="../img/logo/monyet.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Andi Sugar</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <main>

            <div class="cards">
                <?php

                    // DATA 
                    $jmlseller = mysqli_query($conn,"SELECT count(id_penjual) AS jumlahSeller FROM penjual");
                    $dtjmlseller = mysqli_fetch_array($jmlseller);

                    $jmlproduk = mysqli_query($conn,"SELECT count(id_produk) AS jumlahProduk FROM produk");
                    $dtjmlproduk = mysqli_fetch_array($jmlproduk);
                    
                ?>
                <div class="card-single">
                    <div>
                        <h1>73</h1>
                        <span>Daily Views</span>
                    </div>
                    <div>
                        <span><i class="fa fa-eye"></i></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?= $dtjmlseller['jumlahSeller'] ?></h1>
                        <span>Seller</span>
                    </div>
                    <div>
                        <span><i class="fa fa-users"></i></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?=$dtjmlproduk['jumlahProduk']?></h1>
                        <span>Inventory</span>
                    </div>
                    <div>
                        <span><i class="fa fa-suitcase"></i></span>
                    </div>
                </div>
            </div>

            <div class="details">
                <div class="recentorders">
                    <div class="cardheader">
                        <h2>Recent Product</h2>
                        <a href="" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Stock</td>
                                <td>Description</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $produk = mysqli_query($conn, "SELECT * FROM produk");
                                while ($Tproduk = mysqli_fetch_array($produk)) {
                            

                            ?>
                            <tr>
                                <td><?= $Tproduk['nama_produk']?></td>
                                <td><?= $Tproduk['harga']?></td>
                                <td><?= $Tproduk['stok']?></td>
                                <td><?= $Tproduk['deskripsi']?></td>
                                
                            </tr>
                            <?php $no++; }?>
                        </tbody>
                    </table>
                </div>
                <div class="recentcustomers">
                    <div class="cardheader">
                        <h2>Recent Seller</h2>
                    </div>
                    <table>
                        <tbody>
                            <?php
                                $no=1;
                                $seller=mysqli_query($conn, "SELECT * FROM `penjual`");
                                while ($Tseller = mysqli_fetch_array($seller)){

                            ?>
                            <tr>
                                <td width="60px">
                                    <div class="imgbox"><img src="../img/logo/spongebob.png" alt=""></div>
                                </td>
                                <td>
                                    <h4><?= $Tseller['name']?></h4><span><?= $Tseller['telepon']?></span>
                                </td>
                            </tr>
                            
                            <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </section>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/solid.js" integrity="sha384-/BxOvRagtVDn9dJ+JGCtcofNXgQO/CCCVKdMfL115s3gOgQxWaX/tSq5V8dRgsbc" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>