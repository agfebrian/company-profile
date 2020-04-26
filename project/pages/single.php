<?php

    require_once "../core/init.php";

    $id = $_GET['id'];

    if( isset($_GET['id']) ) {

        $detail_article = show_id($id); 
        while( $row = mysqli_fetch_assoc($detail_article) ) {

            $judul     = $row['judul'];
            $gambar    = $row['gambar'];
            $deskripsi = $row['deskripsi'];
            $kategori  = $row['kategori'];
            $waktu     = $row['waktu'];

        }

    }

    if( isset($_SESSION['user']) ) {
        $login = true;
    }else {
        $login = false;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="single.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../asset/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../asset/lib/aos-master/dist/aos.css">
    <script src="../../asset/lib/aos-master/dist/aos.js"></script>
    <script src="../../asset/lib/jquery/jquery.min.js"></script>
    <script src="../../asset/lib/jquery/jquery.js"></script>
    <title>SBP | Detail Proyek</title>
</head>
<body>
    <?php require_once "../view/header.php" ?>   
        <div class="container">
            <div class="image">
                <img src="../../asset/images/upload/<?= $gambar ?>">
            </div>
            <div class="content">
                <p class="title"><?= $judul ?></p>
                <p class="description"><?= $deskripsi ?></p>
                <p class="category">Kategori : <?= $kategori ?></p>
                <?php $date = format_date($waktu); ?>
                <p class="date">Post : <?= $date ?></p>
            </div>
        </div>
    <?php require_once "../view/footer.php" ?>

    <script>
        AOS.init();
    </script>
</body>
</html>