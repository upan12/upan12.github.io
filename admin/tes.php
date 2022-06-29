<?php
if (isset($_POST['btnGambar'])) {
    $id = $_POST['id'];
    $gambar = basename($_FILES['gambar']['name']);

    $ekstensi_diperbolehkan	= array('png','jpg');
        $nama = $_FILES['gambar']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['gambar']['size'];
        $file_tmp = $_FILES['gambar']['tmp_name'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){	
                        
            move_uploaded_file($file_tmp,'./gambarbarang/'.$nama);
            $query = mysqli_query($koneksi, "INSERT INTO gambar VALUES (NULL, $id, '$gambar')");
            if($query){
                
                echo "<script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'gambarBarang.php?id_barang=$recBarang[id_barang]';
            </script>";
            }else{
                echo "<script>
                alert('Gagal mengaupload gambar');
                document.location.href = 'gambarBarang.php?id_barang=$recBarang[id_barang]';
            </script>";
            }
            }else{
            echo "<script>
                alert('Ukuran file terlalu besar');
                document.location.href = 'gambarBarang.php?id_barang=$recBarang[id_barang]';
            </script>";
            }
        }else{
        echo "<script>
                alert('Ekstensi file yang diipload tidak diperbolehkan');
                document.location.href = 'gambarBarang.php?id_barang=$recBarang[id_barang]';
            </script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Tes</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
                <label>Nama Produk</label>
                <input name="nama" type="text" readonly="readonly" class="form-control" 
                >
            </div>
            <div class="mb-3">
                <label>File Gambar</label>
                <input name="gambar" type="file" class="form-control" placeholder="File Gambar">
            </div>
            <input type="hidden" value="<?= $recBarang['id_barang'] ?>" name="id" />
            <input type="hidden" value="<?= $recBarang['nama_barang'] ?>" name="nama" />
            <input type="submit" class="btn btn-primary" name="btnGambar" value="Tambah Gambar" >
    </form>
</body>
</html>