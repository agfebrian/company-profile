<?php 

	require_once "../core/init.php";

	if( $_SESSION['user'] ) {
		$login = true;
	}else {
		$login = false;
		header("Location: project.php");
	}

	$error = "";
	$pesan = "";

	if( isset($_POST['submit']) ) { 
		$user = htmlentities(strip_tags($_POST['user']));
		$pass = htmlentities(strip_tags($_POST['pass']));

		if( empty(trim($user)) && empty(trim($pass)) ) {
			$error = "<div class='error'><p>User dan password harus diisi</p></div>";
		}
		elseif( empty(trim($user)) ) {
			$error = "<div class='error'><p>User harus diisi</p></div>";
		}
		elseif( empty(trim($pass)) ) {
			$error = "<div class='error'><p>Password harus diisi</p></div>";
		}
		elseif( add_users($user,$pass) ) {
                $pesan = "Register berhasil, silahkan login";
				header("Location: login.php?pesan=$pesan");
			}else {
				$error = "<div class='error'><p>User sudah terdaftar</p></div>".mysqli_error($link);
			}
		}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 	<title>Login</title>
 	<link rel="stylesheet" type="text/css" href="login.css">
 </head>
 <body>
 	<div class="wrapping">
 		<div class="auth">
 			<?php
	 			if( isset($_GET['pesan']) ) {
	 				if( isset($_POST['submit']) ) {
	 					$pesan = "";
	 				}else {
						$pesan = $_GET['pesan'];
						echo "<div class='pesan'>$pesan</div>";
					}
				}
			?>
 			<?= $error ?>
 			<form action="" method="POST">
 				<div class="user">
 					<input type="text" name="user">
 				</div>
 				<div class="password">
 					<input type="password" name="pass">
 				</div>
 				<div class="btn">
 					<button type="submit" name="submit">REGISTER</button>
 				</div>
 			</form>
 		</div>
 	</div>
 </body>
 </html>