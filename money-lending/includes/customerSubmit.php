<?php
	include('db.php');

	if(!empty($_POST['ID'])){
		$ID 					= $_POST['ID'];
		$parent_id 				= $_SESSION['parent_id'];
		$customer_id 			= filter_var($_POST['customer_id'], FILTER_SANITIZE_STRING);
		$firstname				= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname 				= filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$phone 					= filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
		$email 					= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$address 				= filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$date_borrowed			= date("Y-m-d", strtotime($_POST['date_borrowed']));
		$defaulted 				= filter_var($_POST['defaulted'], FILTER_SANITIZE_STRING);
		$date_defaulted 		= date("Y-m-d", strtotime($_POST['date_defaulted']));
		$amount 				= filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
		$currency 				= filter_var($_POST['currency'], FILTER_SANITIZE_STRING);
		$remarks 				= filter_var($_POST['remarks'], FILTER_SANITIZE_STRING);

		$nrc_copy 				= $_FILES['nrc_copy']['name'];
		$nrc_filename 			= $_FILES['nrc_copy']['tmp_name'];
		$borrowing_proof 		= $_FILES['borrowing_proof']['name'];
		$proof_filename 		= $_FILES['borrowing_proof']['tmp_name'];

		$query = $connect->prepare("SELECT * FROM money_lending_customers WHERE id = ? AND company_id = ? ");
		$query->execute(array($ID, $parent_id));
		$row = $query->fetch();
		if ($row['nrc_copy'] == '') {
			$nrc_copy			= $_FILES['nrc_copy']['name'];
			$nrc_filename 		= $_FILES['nrc_copy']['tmp_name'];
			$destination_1 = '../uploads/'.basename($nrc_copy);
			move_uploaded_file($nrc_filename, $destination_1);

		}else{
			$nrc_copy = $row['nrc_copy'];
		}

		if ($row['borrowing_proof'] == '') {
			$borrowing_proof 		= $_FILES['borrowing_proof']['name'];
			$proof_filename 		= $_FILES['borrowing_proof']['tmp_name'];
			$destination_2 = '../uploads/'.basename($borrowing_proof);
			move_uploaded_file($proof_filename, $destination_2);
		}else{
			$borrowing_proof = $row['borrowing_proof'];
		}
		
		$update = $connect->prepare("UPDATE `money_lending_customers` SET `customer_id`= ?, `firstname` = ?, `lastname`= ?, `phone` = ?, `email` = ?, `address` = ?, `defaulted` = ?, `date_borrowed` = ?, `date_defaulted`= ?, `amount`= ?, `currency`= ?, remarks = ?, nrc_copy = ?, borrowing_proof = ? WHERE id = ? AND company_id = ? ");
		$ex = $update->execute(array($customer_id, $firstname, $lastname, $phone, $email, $address, $defaulted, $date_borrowed, $date_defaulted, $amount, $currency, $remarks, $nrc_copy, $borrowing_proof, $ID, $parent_id));
		if($ex){
			echo $row['nrc_copy'] . ' Information Updated Car Hiring Reference Bureau';
		}else{
			echo "Error uploading customer";
			exit();
		}

	}else{
	
		$parent_id 				= $_SESSION['parent_id'];
		$customer_id 			= filter_var($_POST['customer_id'], FILTER_SANITIZE_STRING);
		$firstname				= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname 				= filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$phone 					= filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
		$email 					= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$address 				= filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$date_borrowed			= date("Y-m-d", strtotime($_POST['date_borrowed']));
		$date_defaulted 		= date("Y-m-d", strtotime($_POST['date_defaulted']));
		$amount 				= filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
		$currency 				= filter_var($_POST['currency'], FILTER_SANITIZE_STRING);
		$remarks 				= filter_var($_POST['remarks'], FILTER_SANITIZE_STRING);
		$nrc_copy 				= $_FILES['nrc_copy']['name'];
		$nrc_filename 			= $_FILES['nrc_copy']['tmp_name'];
		$borrowing_proof 		= $_FILES['borrowing_proof']['name'];
		$proof_filename 		= $_FILES['borrowing_proof']['tmp_name'];

		if ($customer_id == "" ) {
			echo 'Please add NRC or Passport Number';
			exit();
		}
		
		if ($amount == "") {
			echo "Please add amount borrowed";
			exit();
			$amount = 0.00;
		}
		
		$query = $connect->prepare("SELECT * FROM money_lending_customers WHERE customer_id = ? AND company_id = ? ");
		$query->execute(array($customer_id, $parent_id));
		if ($query->rowCount() > 0) {
			echo 'You have already listed '. $firstname.' holder of ID number '. $customer_id;
			exit();
		}

		$sql = $connect->prepare("INSERT INTO `money_lending_customers`(`customer_id`, `firstname`, `lastname`, `phone`, `email`, `address`, `date_borrowed`, `date_defaulted`, `company_id`, `amount`, `currency`, `remarks`, `nrc_copy`, `borrowing_proof`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
		$ex = $sql->execute(array($customer_id, $firstname, $lastname, $phone, $email, $address, $date_borrowed, $date_defaulted, $parent_id, $amount, $currency, $remarks, $nrc_copy, $borrowing_proof));
		$destination_1 = '../uploads/'.basename($nrc_copy);
		$destination_2 = '../uploads/'.basename($borrowing_proof);
		move_uploaded_file($nrc_filename, $destination_1);
		move_uploaded_file($proof_filename, $destination_2);
	
		if($ex){
			echo $firstname . ' Added to the checklist';
			// give 3 searches
			$earned_tokens = 3;
			$email = $_SESSION['email'];
			$sql = $connect->prepare("INSERT INTO `tokens`(`parent_id`, `earned_tokens`, `email`, `phone`) VALUES (?, ?, ?, ?)");
			$w = $sql->execute(array($parent_id, $earned_tokens, $email, $phone));
			if ($w) {
				$update = $connect->prepare("UPDATE tokens SET total_tokens = paid_for_tokens + earned_tokens WHERE parent_id = ? ");
				$update->execute(array($parent_id));
			}

		}else{
			echo "Error uploading customer";
			exit();
		}	
	}
?>