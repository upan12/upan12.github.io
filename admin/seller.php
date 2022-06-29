<?php
include "../koneksi.php";
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

// SWEET ALERT
function pesan($judul, $kata, $status) {
    $pesan = "<script> Swal.fire('$judul','$kata','$status').then((result) => {
                window.location.href='seller.php';
    });
             </script>";
    return $pesan;
}





// DELETE SELLER
if (isset($_GET['delP'])) {
    $id = $_GET['delP'];
    mysqli_query($conn, "DELETE FROM `penjual` WHERE id_penjual = '$id'");

    echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'seller.php'
          </script>";
}


// EDIT SELLER
if (isset($_GET['editP'])) {
    $id = $_GET['editP'];

    $ep = mysqli_query($conn, "SELECT * FROM penjual WHERE id_penjual = '$id'");
    $rep = mysqli_fetch_array($ep);

    // header("location: data.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <!-- lineawesome new -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Style -->
    <link rel="stylesheet" href="style-admin.css">

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
                    <a href="dashboard.php"><span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="text">Dashboard</span></a>
                </li>
                <li>
                    <a href="seller.php" class="active"><span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <span class="text">Seller</span></a>
                </li>
                <li>
                    <a href="product.php"><span class="icon"><i class="fa-solid fa-box" aria-hidden="true"></i></span>
                        <span class="text">Product</span></a>
                </li>
                <!-- <li>
                <a href=""><span class="icon"><i class="fa fa-comments" aria-hidden="true"></i></span>
                <span class="text">Messages</span></a>
                </li> -->
                <!-- <li>
                    <a href=""><span class="icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <span class="text">Help</span></a>
                </li> -->
                <li>
                    <a href=""><span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                        <span class="text">Setting</span></a>
                </li>
                <!-- <li>
                <a href=""><span class="icon"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                <span class="text">Accounts</span></a>
                </li> -->
                <li>
                    <a href="logout.php"><span class="icon"><i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i></span>
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

                Seller
            </h2>

            <div class="user-wrapper">
                <img src="../img/logo/monyet.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Andi Sugar</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>
        <main>

            <div class="container">
                <div class="search_wrap">
                    <div class="search_box">
                        <div class="button button_common">
                            <i class="las la-search"></i>
                        </div>
                        <input type="text" class="input" placeholder="Search...">
                    </div>
                </div>
            </div>

            <div class="details">
                <div class="recentorders">
                    <div class="cardheader">
                        <h2>Seller</h2>
                        <!-- <a href="" class="btn">View All</a> -->
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Id Seller</td>
                                <td>Profil</td>
                                <td>Username</td>
                                <td>Name</td>

                                <td>Telephone</td>
                                <td colspan="2"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $seller = mysqli_query($conn, "SELECT * FROM penjual");
                            while ($Tseller = mysqli_fetch_array($seller)) {
                            ?>
                                <tr>
                                    <td><?= $Tseller['id_penjual'] ?></td>
                                    <td><?= $Tseller['profil'] ?></td>
                                    <td><?= $Tseller['username'] ?></td>
                                    <td><?= $Tseller['name'] ?></td>

                                    <td><?= $Tseller['telepon'] ?></td>
                                    <td><a href="?editP=<?= $Tseller['id_penjual'] ?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><a href="?delP=<?= $Tseller['id_penjual'] ?>" class="btn" onclick="return confirm('Apakah anda yakin menghapus data tersebut?');"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="recentcustomers">

                    <div class="form-container">
                        <div class="form-btn">
                            <?php if (isset($_GET['editP'])) { ?>
                                <div class="cardheader">
                                    <h2>Edit Seller</h2>
                                </div>
                                <form action="" method="post"><br>
                                    <!-- <input type="text" placeholder="Id Seller"> -->
                                    <input type="text" readonly="readonly" name="id" value="<?= $id ?>">
                                    <input name="gambar" type="file" class="form-control" placeholder="File Gambar">
                                    <input type="text" name="username" minlength="3" required placeholder="Username" value="<?= $rep['username'] ?>">
                                    <input type="text" name="name" minlength="3" required placeholder="Name" value="<?= $rep['name'] ?>">
                                    <input type="number" name="telepon" minlength="3" required placeholder="Telephone" value="<?= $rep['telepon'] ?>">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <button type="submit" name="edit" class="btn">
                                        Update
                                    </button>
                                </form>
                                <?php
                                // UPDATE SELLER
                                if (isset($_POST['edit'])) {
                                    $user = $_POST['username'];
                                    $name = $_POST['name'];
                                    $telp = $_POST['telepon'];
                                    $id = $_POST['id'];

                                    // echo "$user,$name,$pass,$telp,$id";

                                    mysqli_query($conn, "UPDATE `penjual` SET `username`='$user',`name`='$name',`password`='$pass',`telepon`='$telp' 
                            WHERE id_penjual = '$id'");
                                    echo pesan("Good Job!", "Data has been changed", "success");
                                }
                                ?>
                            <?php } else { ?>
                                <div class="cardheader">
                                    <h2>Add Seller</h2>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data"><br>
                                    <!-- <input type="text" placeholder="Id Seller"> -->
                                    <input name="gambar" type="file" class="form-control" placeholder="File Gambar">
                                    <input type="text" name="username" minlength="3" required placeholder="Username">
                                    <input type="text" name="name" minlength="3" required placeholder="Name">
                                    <input type="password" name="password" minlength="3" required placeholder="Password">
                                    <input type="number" name="telepon" minlength="3" required placeholder="Telephone">
                                    <!-- <input type="file" name="profil" placeholder="Profile"> -->
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <button type="submit" name="add" class="btn">
                                        Add
                                    </button>
                                </form>
                            <?php } ?>
                            <?php
                            // ADD SELLER
                            if (isset($_POST['add'])) {
                                $user = $_POST['username'];
                                $name = $_POST['name'];
                                $pass = $_POST['password'];
                                $telp = $_POST['telepon'];


                                // echo $name;
                                mysqli_query($conn, "INSERT INTO `penjual`(`id_penjual`, `username`, `name`, `password`, `telepon`) 
                            VALUES ('','$user','$name','$pass','$telp')");
                                echo pesan("Good Job!", "username successfully added", "success");
                            } ?>
                        </div>
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