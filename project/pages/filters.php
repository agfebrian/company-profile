<?php

    require_once "../core/init.php";

    if( isset($_SESSION['user']) ) {
        $login = true;
    }else {
        $login = false;
    }

    if( isset($_GET['f']) ) {
        $filters = $_GET['f'];
        $result = filters($filters);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../view/nav_header.css">
    <link rel="stylesheet" href="../../asset/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../asset/lib/aos-master/dist/aos.css">
    <script src="../../asset/lib/aos-master/dist/aos.js"></script>
    <script src="../../asset/lib/jquery/jquery.min.js"></script>
    <script src="../../asset/lib/jquery/jquery.js"></script>
    <script src="jquery.js"></script>
    <title>SBP | Filters</title>
</head>
<body>
    <?php require_once "../view/header.php" ?>
    <div class="container">
        <?php require_once "../view/nav_header.php" ?>
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <?php 
                    // echo "<pre>";
                    // var_dump(getdate($row['waktu'])); 
                    // echo "<pre>"; 
                    // die;
                ?>

                <div class="box-items">
                    <div class="box-item">
                        <img src="../../asset/images/upload/<?= $row['gambar']; ?>" alt="">
                        <p class="cards-header"><?= $row['judul'] ?></p>
                        <p class="cards-content"><?= excerpt($row['deskripsi']) ?></p>
                        <p class="cards-category">Kategori : <?= $row['kategori'] ?></p>
                        <?php 
                            $waktu = format_date($row['waktu']);
                            // var_dump($waktu); die;
                        ?>
                        <p class="cards-times">Post : <?= $waktu; ?></p>
                        <a class="btn-detail" href="single.php?id=<?= $row['id'] ?>">Detail Proyek</a>
                        <?php if( $login ) : ?>
                        <a class="btn-edit" href="edit.php?id=<?= $row['id'] ?>">EDIT</a>
                        <a class="btn-del" href="delete.php?id=<?= $row['id'] ?>">HAPUS</a>
                        <?php endif ?>
                    </div>
                </div>
            <?php endwhile ?>   
    </div>

    <?php require_once "../view/footer.php" ?>

    <script>
        AOS.init();
    </script>
    </div>
</body>
</html>