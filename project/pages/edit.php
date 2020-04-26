<?php

    require_once "../core/init.php";

    if( isset($_SESSION['user']) ) {
        $login = true;
    }else {
        $login = false;
        header("Location: project.php");
    }

    $error  = "";
    $id     = $_GET['id'];

    if( isset($_GET['id']) ) {
        $article = show_id($id);
        while($row = mysqli_fetch_assoc($article)) {
            $judul_awal     = $row['judul'];
            $gambar_awal    = $row['gambar'];
            $deskripsi_awal = $row['deskripsi'];
            $kategori_awal  = $row['kategori'];
        }
    }

    if( isset($_POST['submit']) ) {
        $judul     = htmlentities(strip_tags($_POST['judul']));
        $deskripsi = htmlentities(strip_tags($_POST['deskripsi']));
        $kategori  = htmlentities(strip_tags($_POST['kategori']));

        if( empty(trim($judul)) ) {
            $error .= "<p>Judul harus diisi</p>";
        }
        if( empty(trim($deskripsi)) ) {
            $error .= "<p>Deskripsi harus diisi</p>";
        }
        if(  empty(trim($kategori)) ) {
            $error .= "<p>Kategori harus diisi</p>";
        }else {
            edit_article($judul,$deskripsi,$kategori,$id,$gambar_awal);
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
    <title>Edit Project</title>
</head>
<body>
    <?php require_once "../view/header.php" ?>
    <div class="container">
        <div class="form-update-article">
            <?php echo $error ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="judul">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" value="<?= $judul_awal ?>" placeholder="judul">
                </div>
                <div class="update-gambar">
                    <label for="gambar">Gambar</label>
                    <img src="../../asset/images/upload/<?= $gambar_awal ?>" width="100">
                    <input type="file" name="gambar">
                </div>
                <div class="deskripsi">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" cols="30" rows="10" placeholder="deskripsi"><?= $deskripsi_awal ?></textarea>
                </div>
                <div class="kategori">
                    <label for="kategori">Kategori</label>
                    <select class="kategori" name="kategori" id="kategori">
                        <option value="Baja Ringan" <?php if( $kategori_awal == "Baja Ringan" ) echo "selected"; ?>>Baja Ringan</option>
                        <option value="Konstruksi" <?php if( $kategori_awal == "Konstruksi" ) echo "selected"; ?>>Konstruksi</option>
                        <option value="Property" <?php if( $kategori_awal == "Property" ) echo "selected"; ?>>Project</option>
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