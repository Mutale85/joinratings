<?php
	include('db.php');

	if(!empty($_POST['ID'])){
		$ID 					= $_POST['ID'];
		$parent_id 				= $_SESSION['parent_id'];
		$customer_id 			= filter_var($_POST['customer_id'], FILTER_SANITIZE_STRING);
		$firstname				= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname 				= filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$license 				= filter_var($_POST['licence'], FILTER_SANITIZE_STRING);
		$defaulted 				= filter_var($_POST['defaulted'], FILTER_SANITIZE_STRING);
		$date_defaulted 		= date("Y-m-d", strtotime($_POST['date_defaulted']));
		$amount_defaulted 		= filter_var($_POST['amount_defaulted'], FILTER_SANITIZE_STRING);
		$currency 				= filter_var($_POST['currency'], FILTER_SANITIZE_STRING);
		$remarks 				= filter_var($_POST['remarks'], FILTER_SANITIZE_STRING);

		$update = $connect->prepare("UPDATE `customers` SET `customer_id`= ?, `firstname` = ?, `lastname`= ?,`licence`= ?, `defaulted`= ?, `date_defaulted`= ?, `amount_defaulted`= ?, `currency`= ?, remarks = ? WHERE id = ? AND company_id = ? ");
		$ex = $update->execute(array($customer_id, $firstname, $lastname, $license, $defaulted, $date_defaulted, $amount_defaulted, $currency, $remarks, $ID, $parent_id));
		if($ex){
			echo $firstname . ' Information Updated Car Hiring Reference Bureau';
		}else{
			echo "Error uploading customer";
			exit();
		}

	}else{
	
		$parent_id 				= $_SESSION['parent_id'];
		$customer_id 			= filter_var($_POST['customer_id'], FILTER_SANITIZE_STRING);
		$firstname				= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname 				= filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$license 				= filter_var($_POST['licence'], FILTER_SANITIZE_STRING);
		$defaulted 				= filter_var($_POST['defaulted'], FILTER_SANITIZE_STRING);
		$date_defaulted 		= date("Y-m-d", strtotime($_POST['date_defaulted']));
		$amount_defaulted 		= filter_var($_POST['amount_defaulted'], FILTER_SANITIZE_STRING);
		$currency 				= filter_var($_POST['currency'], FILTER_SANITIZE_STRING);
		$remarks 				= filter_var($_POST['remarks'], FILTER_SANITIZE_STRING);

		if ($customer_id == "" ) {
			echo 'Please add NRC or Passport Number';
			exit();
		}
		if ($license == '') {
			echo "license Number s required";
			exit();
		}
		
		$query = $connect->prepare("SELECT * FROM customers WHERE licence = ? AND company_id = ? ");
		$query->execute(array($license, $parent_id));
		if ($query->rowCount() > 0) {
			echo 'You have already Listed '. $firstname.' holder of license number '. $license;
			exit();
		}
		
		$sql = $connect->prepare("INSERT INTO `customers`(`customer_id`, `firstname`, `lastname`, `licence`, `defaulted`, `date_defaulted`, `company_id`, `amount_defaulted`, `currency`, `remarks`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$ex = $sql->execute(array($customer_id, $firstname, $lastname, $license, $defaulted, $date_defaulted, $parent_id, $amount_defaulted, $currency, $remarks));
	
		if($ex){
			echo $firstname . ' Added to Car Hiring Reference Bureau';
		}else{
			echo "Error uploading customer";
			exit();
		}	
	}
?>