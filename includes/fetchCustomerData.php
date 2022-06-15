<?php
	include 'db.php';
	if (isset($_POST['company_id'])) {
		$company_id = $_POST['company_id'];
		$query = $connect->prepare("SELECT * FROM customers WHERE company_id = ?");
		$query->execute(array($company_id));
		if ($query->rowCount() > 0) {
			foreach ($query->fetchAll() as $row) {
				extract($row);
				if($defaulted == 1){
					$status = '<p>Defaulted<p>
								<p>'.$currency.' '.$amount_defaulted.'</p>
								<p>Date: '.date("F j, Y", strtotime($date_defaulted)).'</p>
							'; 
				}else{
					$status = 'Clean Customer';
				}
		?>
			<tr>
				<td><?php echo $firstname ?> <?php echo $lastname ?></td>
				<td><?php echo $customer_id ?></td>
				<td><?php echo $licence ?></td>
				<td><?php echo $status?></td>
				<td><?php echo $remarks?></td>
				<td><a href="<?php echo $id?>" class="editCustomer text-decoration-none"> <i class="bi bi-pen"></i> Edit</a></td>
				<td><a href="<?php echo $id?>" class="deleteCustomer text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
			</tr>
		<?php
			}
		}else{

		}
	}

?>