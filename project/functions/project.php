<?php

    function show() {

        global $link;

        $query  = "SELECT * FROM proyek ORDER BY id DESC";
        $result = mysqli_query($link,$query);
        if( !$result ) {
            die("Query tampilkan gagal");
        }else {
            return $result;
        }

    }

    function search($judul) {

        global $link;

        $query  = "SELECT * FROM proyek WHERE judul LIKE '%$judul%'";
        $result = mysqli_query($link,$query);
        if( !$result ) {
            die("Query gagal dicari");
        }else {
            return $result;
        }

    }

    function filters($filters) {

        global $link;

        $query  = "SELECT * FROM proyek WHERE kategori LIKE '%$filters%'";
        $result = mysqli_query($link,$query);
        if( !$result ) {
            die("Query filter gagal ");
        }else {
            return $result;
        }

    }

    function show_id($id) {

        global $link;

        $query = "SELECT * FROM proyek WHERE id=$id";
        $result = mysqli_query($link,$query);
        if( !$result ) {
            die("Query gagal di tampilkan");
        }else {
            return $result;
        }

    }

    function show_all_category($kategori) {

        global $link;
        $query = "SELECT * FROM proyek WHERE kategori='$kategori'";
        $result = mysqli_query($link,$query);
        if( !$result ) {
            die("Query gagal di tampilkan");
        }else {
            return $result;
        }

    }

    function add_article($judul,$gambar,$deskripsi,$kategori) {

        global $link;
        $judul     = mysqli_real_escape_string($link,$judul);
        $deskripsi = mysqli_real_escape_string($link,$deskripsi);
        $kategori  = mysqli_real_escape_string($link,$kategori);

        $gambar = upload($gambar);
        if( !$gambar ) {
            return false;
        }

        $query = "INSERT INTO proyek (judul, gambar, deskripsi, kategori) VALUES ('$judul','$gambar','$deskripsi','$kategori')";
        return run($query);

    }

    function edit_article($judul,$deskripsi,$kategori,$id,$gambar_awal) {

        global $link;
        $judul     = mysqli_real_escape_string($link,$judul);
        $deskripsi = mysqli_real_escape_string($link,$deskripsi);
        $kategori  = mysqli_real_escape_string($link,$kategori);

        // cek apakah user pilih gambar
        if( $_FILES['gambar']['error'] === 4 ) {
            $gambar = $gambar_awal;
        }else {
            $gambar = upload($gambar);
        }var_dump($gambar); die;

        $query = "UPDATE proyek SET judul='$judul',gambar='$gambar',deskripsi='$deskripsi',kategori='$kategori'";
        $query .= "WHERE id=$id";
        return run($query);

    }

    function delete_article($id) {

        $query = "DELETE FROM proyek WHERE id=$id";
        return run($query);

    }

    function upload($gambar) {

        global $link;

        $file_name  = $_FILES['gambar']['name'];
        $file_size  = $_FILES['gambar']['size'];
        $error_file = $_FILES['gambar']['error'];
        $tmp_name   = $_FILES['gambar']['tmp_name'];

        // cek apakah gambar telah di upload
        if( $error_file === 4 ) {
            $error = "Gambar harus di upload";
            header("Location: add.php?error=$error");
            return false;
        }

        // cek format gambar
        $ekstensi_valid  = ["jpg","jpeg","png"];
        $ekstensi_gambar = explode(".",$file_name);
        $ekstensi_gambar = strtolower(end($ekstensi_gambar));
        if( !in_array($ekstensi_gambar,$ekstensi_valid) ) {
            $error = "Format yang anda masukan bukan gambar";
            header("Location: add.php?error=$error");
            return false;
        } 

        // membatasi ukuran file
        if( $file_size > 1500000 ) {
            $error = "Gambar terlalu besar";
            header("Location: add.php?error=$error");
            return false;
        }

        // ambil dan pindahkan gambar
        // bangkitkan nama file baru agar tidak ada nama kembar
        $new_file_name = uniqid();
        $new_file_name .= ".".$ekstensi_gambar;
        move_uploaded_file($tmp_name,"../../asset/images/upload/".$new_file_name);
        return $new_file_name;

    }

    function run($query) {

        global $link;

        $result = mysqli_query($link,$query);
        if( !$result ) {
            die("Query run gagal...");
        }else {
            header("Location: project.php");
        }

    }

    function excerpt($string) {

        $string = substr($string, 0, 100);
        return $string ."...";

    }

    function format_date($date) {

        $new_date = explode(" ",$date);;
        $new_date[0] = explode("-",$new_date[0]);
        $date        = array_reverse($new_date[0]);
        // var_dump(date("d M Y", strtotime("{$date[0]}-{$date[1]}-{$date[2]}"))); die;

        return date("d M Y", strtotime("{$date[0]}-{$date[1]}-{$date[2]}"));

    }

?>