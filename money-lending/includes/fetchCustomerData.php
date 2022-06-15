<?php
	include 'db.php';
	if (isset($_POST['company_id'])) {
		$company_id = $_POST['company_id'];
		$query = $connect->prepare("SELECT * FROM money_lending_customers WHERE company_id = ?");
		$query->execute(array($company_id));
		if ($query->rowCount() > 0) {
			foreach ($query->fetchAll() as $row) {
				extract($row);
				if($defaulted == 1){
					$status = '<span class="text-danger"> Defaulted </span>
							'; 
				}else{
					$status = 'Cleared';
				}

				if($rating == 0){
					$rate = '<a href="'.$customer_id.'" class="rate_client"> <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></a>'; 
				}elseif($rating == 1){
					$rate = '<a href="'.$customer_id.'" class="rate_client"> <i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></a>';
				}elseif ($rating == 2) {
					$rate = '<a href="'.$customer_id.'" class="rate_client"> <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></a>';
				}elseif ($rating == 3) {
					$rate = '<a href="'.$customer_id.'" class="rate_client"> <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></a>';
				}elseif ($rating == 4) {
					$rate = '<a href="'.$customer_id.'" class="rate_client"> <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i></a>';
				}elseif ($rating == 5) {
					$rate = '<a href="'.$customer_id.'" class="rate_client"> <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></a>';
				}
		?>
			<tr>
				<td><a href="<?php echo $id?>" class="text-decoration-none view_details"><?php echo $firstname ?> <?php echo $lastname ?></a></td>
				<td><a href="<?php echo $id?>" class="text-decoration-none view_details">View Details</a></td>
				<td><a href="edit-client?client-id=<?php echo base64_encode($id)?>" class="editCustomers text-decoration-none"> <i class="bi bi-pen"></i> Edit</a></td>
			</tr>
		<?php
			}
		}else{

		}
	}

?>