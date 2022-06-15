<?php
	function getUserIpAddr(){
	    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        //ip from share internet
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        //ip pass from proxy
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

	function time_ago_check($time){
		// date_default_timezone_set("Africa/Lusaka");
		$time_ago 	= strtotime($time);
		$current_time = time();
		$time_difference = $current_time - $time_ago;
		$seconds = $time_difference;
		//lets make tround thes into actual time.
		$minutes 	= round($seconds / 60);
		$hours		= round($seconds / 3600);
		$days 		= round($seconds / 86400);
		$weeks   	= round($seconds / 604800); // 7*24*60*60;  
		$months  	= round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
		$years   	= round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

		if ($seconds <= 60) {
			return "$seconds Seconds Ago";
		}else if ($minutes <= 60) {

			if ($minutes == 1) {
				return "1 minute Ago";
			}else{
				return "$minutes minutes ago";
			}
			
		}else if ($hours <= 24) {
			if ($hours == 1) {
				return "1 hour ago";
			}else{
				return "$hours hrs ago";
			}
		}else if ($days <= 7) {
			if ($days == 1) {
				return "1 day ago";
			}else{
				return "$days days ago";
			}
		}else if ($weeks < 7) {
			if ($weeks == 1) {
			
				return "1 week ago";
			}else{
				return "$weeks Weeks ago";
			}
		}else if ($months <= 12) {
			if ($months == 1) {
				return "1 month ago";
			}else{
				return "$months Months ago";
			}
		}else {
			if ($years == 1) {
				return "One year ago";
			}else{
				return "$years years ago";
			}
		}
	}

	function getCompanyName($connect, $parent_id){
		$output = "";
		$query = $connect->prepare("SELECT * FROM members WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		$row = $query->fetch();
		if ($row) {
			extract($row);
			$output = $company_name;
		}
		return $output;
	}

	/*
	#  SEARCH FOR CARS FUNCTIONS
	#
	#
	#
	*/

	function searchCounterUpdater($connect, $parent_id, $user_id, $customer_id){
		$query = $connect->prepare("SELECT * FROM search_counter WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		$count = $query->rowCount();
		$get = $connect->prepare("SELECT * FROM tokens WHERE parent_id = ? ");
		$get->execute(array($parent_id));
		$row = $get->fetch();
		extract($row);
		if ($total_tokens == 0) {
			# code...
		}else{
			if ($count > 0) {
				$update = $connect->prepare("UPDATE search_counter SET search = search + 1 WHERE parent_id = ? ");
				$update->execute(array($parent_id));
				$update = $connect->prepare("UPDATE tokens SET total_tokens = total_tokens - 1  WHERE parent_id = ?");
				$update->execute(array($parent_id));
			}else{
				$search = 1;
				$sql = $connect->prepare("INSERT INTO `search_counter`(`parent_id`, `user_id`, `search`, `customer_id`) VALUES (?, ?, ?, ?) ");
				$sql->execute(array($parent_id, $user_id, $search, $customer_id));
				$update = $connect->prepare("UPDATE tokens SET total_tokens = total_tokens - 1  WHERE parent_id = ?");
				$update->execute(array($parent_id));
			}
		}
	}

	function searchCounter($connect, $parent_id){
		$output = '';
		$query = $connect->prepare("SELECT * FROM search_counter WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		if($query->rowCount() > 0){
			$row = $query->fetch();
			if ($row) {
				extract($row);
				$output = $search;
			}
		}else{
			$output = 0;
		}
		return $output;
	}

	function fetchAddedClients($connect, $parent_id){
		$output = '';
		if ($_SESSION['business_type'] == 'Car Hiring') {
			# code...
		
			$query = $connect->prepare("SELECT * FROM car_hiring_customers WHERE company_id = ? ");
			$query->execute(array($parent_id));
			$query->execute(array($parent_id));
			$count = $query->rowCount();
			
			$output =  $count;
		}elseif ($_SESSION['business_type'] == 'Money Lending') {

			$query = $connect->prepare("SELECT * FROM money_lending_customers WHERE company_id = ? ");
			$query->execute(array($parent_id));
			$count = $query->rowCount();
			
			$output =  $count;
		}

		return $output;
	}

	function getAvailableTokens($connect, $parent_id){
		$output = "";
		$query = $connect->prepare("SELECT * FROM tokens WHERE parent_id = ?");
		$query->execute(array($parent_id));
		if ($query->rowCount() > 0) {
			
			$row = $query->fetch();
			if ($row) {
				extract($row);
				$output = $total_tokens;
			}
		}else{
			$output = 0;
		}

		return $output;
	}


?>