<?php
	include 'db.php';
		if (isset($_POST['id_searched'])) {
			$customer_id= $_POST['id_searched'];
			$parent_id 	= $_SESSION['parent_id'];
			$user_id   	= $_SESSION['user_id'];
			if (getAvailableTokens($connect, $parent_id) <= 0) {?>
    			<p>You have no tokens availables <a href="purchase-tokens" class="text-decoration-none">Purchase Token</a> or <a href="submit-new-client" class="text-decoration-none"> Get Free Tokens</a></p>
    			<p><a href="search" class="text-decoration-none"><i class="bi bi-arrow-clockwise"></i> Refresh</a></p>
    		<?php }else{
				echo searchCounterUpdater($connect, $parent_id, $user_id, $customer_id);
				$query = $connect->prepare("SELECT * FROM car_hiring_customers WHERE customer_id = ? OR licence = ? ");
				$query->execute(array($customer_id, $customer_id));
				$rowcount = $query->rowCount();

				if ($rowcount > 0) {?>
					<div class="mt-5">
						<div class="card card-info">
							<div class="card-header">
								<h5 class="card-title">Client Search Result</h5>
							</div>
							<div class="card-body">
								<div class="table table-responsive">
									<table class="table table-striped" id="customersTable" style="width: 100%;">
										<thead>
											<tr>
												<th>Client Names</th>
												<th>Client ID</th>
												<th>License</th>
												<th>Default Status</th>
												<th>Remarks</th>
												<th>Listed By</th>
											</tr>
										</thead>
										<tbody id="search_result">
										<?php
											$row = $query->fetch();
											extract($row);
											if($defaulted == 1){
												$status = '<span class="text-danger">Defaulted</span>'; 
											}else{
												$status = 'Cleared';
											}
											$search_result = 'Listed';
											$sql = $connect->prepare("INSERT INTO `searches_done`(`parent_id`, `client_id`, `search_result`, `client_status`) VALUES (?, ?, ?, ?) ");
											$sql->execute(array($parent_id, $customer_id, $search_result, $defaulted));
										?>
											<tr>
												<td><?php echo $firstname ?> <?php echo $lastname ?></td>
												<td><?php echo $customer_id ?></td>
												<td><?php echo $licence ?></td>
												<td><?php echo $status?></td>
												<td><?php echo $remarks?></td>
												<td><?php echo getCompanyName($connect, $company_id)?></td>
											</tr>
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
	                
			<?php	
				}else{?>
					<div class="mt-5 d-flex justify-content-between">
					 	<p class="fs-5"><b><?php echo $customer_id ?></b> has not been registered yet </p>
					 	<p class="fs-5"><a href="submit-new-client" class="text-decoration-none">Add User and Earn Search Tokens</a></p>
					</div>
			<?php
					$search_result = 'Not Listed';
					$defaulted = 0;
					$sql = $connect->prepare("INSERT INTO `searches_done`(`parent_id`, `client_id`, `search_result`, `client_status`) VALUES (?, ?, ?, ?) ");
					$sql->execute(array($parent_id, $customer_id, $search_result, $defaulted));		
				}
			}
		}
?>