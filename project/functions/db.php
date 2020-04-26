<?php 

    $host    = "localhost";
    $user    = "root";
    $pass    = "";
    $db_name = "sbp";

    $link = mysqli_connect($host,$user,$pass,$db_name);
    if( !$link ) {
        die("Koneksi gagal : ".mysqli_connect_error());
    }

?>