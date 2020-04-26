<?php

    require_once "../core/init.php";

    if( isset($_SESSION['user']) ) {
        $login = true;
    }else {
        $login = false;
        header("Location: project.php");
    }

    $error     = "";

    if( isset($_POST['submit']) ) {

        $judul     = htmlentities(strip_tags($_POST['judul']));
        $gambar    = $_FILES;
        $deskripsi = htmlentities(strip_tags($_POST['deskripsi']));
        $kategori  = htmlentities(strip_tags($_POST['kategori']));

        if( empty(trim($judul)) ) {
            $error = "<p>Judul harus diisi</p>";
        } 
        if( empty(trim($deskripsi)) ) {
            $error .= "<p>Deskripsi harus diisi</p>";
        }
        else {
            $row =  add_article($judul,$gambar,$deskripsi,$kategori);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../asset/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../asset/lib/aos-master/dist/aos.css">
    <script src="../../asset/lib/aos-master/dist/aos.js"></script>
    <script src="../../asset/lib/jquery/jquery.min.js"></script>
    <script src="../../asset/lib/jquery/jquery.js"></script>
    <script src="jquery.js"></script>
    <title>Tambah Project</title>
</head>
<body>
    <?php require_once "../view/header.php" ?>
    <div class="container">
        
            <?php 
                if( $error !== "" ) {
                    echo "<div class='error'>$error</div>";
                } 
                if( isset($_GET['error']) ) {
                        $error_img = $_GET['error'];
                        echo "<div class='error'>$error_img</div>";
                }
            ?>
        <div class="form-add-article">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="judul">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" placeholder="judul">
                </div>
                <div class="gambar">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar">
                </div>
                <div class="deskripsi">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="input-desc" name="deskripsi" cols="30" rows="10" placeholder="deskripsi"></textarea>
                </div>
                <div class="kategori">
                    <label for="kategori">Kategori</label>
                    <select class="kategori" name="kategori">
                        <option value="Baja Ringan">Baja Ringan</option>
                        <option value="Konstruksi">Konstruksi</option>
                        <option value="Property">Property</option>
                    </select>
                </div>
                <div class="btn-add">
                    <button type="submit" name="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <?php require_once "../view/footer.php" ?>
</body>
</html>