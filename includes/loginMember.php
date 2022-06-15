<?php

	include("db.php");
	if (isset($_POST['email'])) {
		$email 		= trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
		$password 	= trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
		$user_ip 	= getUserIpAddr();
		$ip_address = getUserIpAddr();
	  	$geo = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip_address) );
		$user_country = $geo["geoplugin_countryName"];
		if ($email == "") {
			echo "email is empty";
			exit();
		}
		if ($password == "") {
			echo "password are empty";
			exit();
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "invalid email";
			exit();
		}

		$query = $connect->prepare("SELECT * FROM members WHERE email = ? ");
		$query->execute(array($email));
		if ($query->rowCount() > 0) {
			foreach ($query->fetchAll() as $row) {
				if($row['activate'] == 1){
					if (password_verify($password, $row['password'])) {
						$_SESSION['email'] 			= $row['email'];
					    $_SESSION['user_id'] 		= $row['id'];
					    $_SESSION['fullnames'] 		= $row['fullnames'];
					    $_SESSION['parent_id'] 		= $row['parent_id'];
					    $_SESSION['business_type'] 	= $row['business_type'];
					    $password 					= $row['password'];
					    $parent_id 					= $row['parent_id'];
					    $sql = $connect->prepare("INSERT INTO `login_table`(`parent_id`, `email`, `password`, `user_ip`, `user_country`) VALUES(?, ?, ?, ?, ?) ");
					    $sql->execute(array($parent_id, $email, $password, $user_ip, $user_country));
					    $getID = $connect->lastInsertId();
					    $_SESSION['lastID'] = $getID;

					    setcookie("memberLoggedIn", base64_encode($_SESSION['email']. password_hash($_SESSION['email'], PASSWORD_DEFAULT)), time()+60*60*24*30, '/');
					    setcookie("LoggedInUserType", $row['business_type'], time()+60*60*24*30, '/');
					    
					    echo "Redirecting you in 1 Second";

					}else{
						echo "Incorrect password or email";
						exit();
					}
				}else{
					echo "Please Activate Your Account";
					exit();
				}
			}
		}else{
			echo 'User not found';
			exit();
		}

	}
?>