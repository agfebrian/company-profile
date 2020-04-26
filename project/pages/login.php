<?php 

	require_once "../core/init.php";

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
		elseif( cek_data_login($user,$pass) ) {
				$_SESSION['user'] = $user;
				header("Location: project.php");
			}else {
				$error = "<div class='error'><p>User dan / password salah</p></div>".mysqli_error($link);
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
 					<button type="submit" name="submit">LOGIN</button>
				 </div>
			 </form>
			 <p>Kembali ke <a href="project.php">Project</a></p>
 		</div>
 	</div>
 </body>
 </html>