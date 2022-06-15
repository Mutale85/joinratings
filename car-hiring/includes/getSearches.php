<?php
	include 'db.php';
	$parent_id = $_SESSION['parent_id'];
	if (isset($_POST['getSearches'])) {
		$query = $connect->prepare("SELECT * FROM `searches_done` WHERE parent_id = ? ORDER BY `id` DESC ");
		$query->execute(array($parent_id));
		if ($query->rowCount() > 0) {?>

			<div class="table table-responsible">
				<table class="table table-bordered" id="search_table">
					<thead>
						<tr>
							<th>Client ID</th>
							<th>Search Result</th>
							<th>Search Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($query->fetchAll() as $row) {
								extract($row);
								if ($search_result == 'Not Listed' && $client_status == 0) {
									$client_status = 'Clear';
								}elseif ($search_result == 'Listed' && $client_status == 0) {
									$client_status = 'Clear';
								}else{
									$client_status = 'Defauted';
								}
							?>
								<tr>
									<td><?php echo $client_id;?></td>
									<td><?php echo $search_result;?></td>
									<td><?php echo date(" jS \ F Y - H:i:s A", strtotime($search_date));?></td>
									<td><?php echo $client_status;?></td>
								</tr>
						<?php	}
						?>
					</tbody>
				</table>
			</div>
			<script>
				$("#search_table").DataTable();
			</script>
<?php		
		}

	}
?>