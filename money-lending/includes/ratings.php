<?php
	include 'db.php';
	if (isset($_POST['client_id'])) {
		$client_id = $_POST['client_id'];
		$rating = $_POST['rating'];
		$parent_id = $_SESSION['parent_id'];

		$update = $connect->prepare("UPDATE money_lending_customers SET rating = ? WHERE customer_id = ? AND company_id = ? ");
		$up = $update->execute(array($rating, $client_id, $parent_id));
		if ($up) {
			echo 'Client Given '. $rating. ' <i class="bi bi-star-fill"></i> rating';
		}
	}
?>