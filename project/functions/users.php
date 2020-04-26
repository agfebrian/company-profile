<?php 

	function add_users($user,$pass) {

		global $link;
		
		$user      = mysqli_real_escape_string($link,$user);
		$pass      = mysqli_real_escape_string($link,$pass);
		$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

		$query = "INSERT INTO users (user, password) VALUES ('$user','$pass_hash')";
		if( $result = mysqli_query($link,$query) ) return true;
		else return false;

	}

	function cek_data_login($user,$pass) {

		global $link; 

			$user      = mysqli_real_escape_string($link,$user);
			$pass      = mysqli_real_escape_string($link,$pass);

			$query = "SELECT * FROM users WHERE user='$user'";
			if( $result = mysqli_query($link,$query) ) { 
				if( mysqli_num_rows($result) != 0 ) { // var_dump(mysqli_num_rows($result)); die;
					$row  = mysqli_fetch_assoc($result); // var_dump($pass); die;
					$hash = $row['password'];
					if( password_verify($pass, $hash) ) return true;
					else return false;
				}else {
					return false;
				}
			}

	}

?>