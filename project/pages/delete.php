<?php

    require_once "../core/init.php";

    if( isset($_SESSION['user']) ) {
        $login = true;
    }else {
        $login = false;
        header("Location: project.php");
    }

    if( isset($_GET['id']) ) {
        if( delete_article($_GET['id']) ) {
            header("Location: project.php");
        }else {
            echo "Hapus artikel gagal";
        }
    }

?>