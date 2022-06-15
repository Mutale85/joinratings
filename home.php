<!DOCTYPE html>
<html>
<head>
	<?php
		include("includes/db.php"); 
		if(!isset($_COOKIE['memberLoggedIn']) && !isset($_SESSION['email'])){?>
		<script>
	      window.location = './'
	    </script>
	<?php	
		}
	?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"> -->
	<title><?php echo $_SESSION['fullnames']?> - Dashboard</title>
</head>
<body class="bg-secondarys">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-5">
				<p class="mt-5"><a href="signout" class="text-decoration-none"><i class="bi bi-door-open"></i> Exit </a></p><h1 class="mt-5 text-center text-dade"><?php echo $_SESSION['fullnames']?></h1>
				<br><br>
				<div class="d-flex justify-content-between">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Add Client
					</button>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SearchModal">
						Search Client
					</button>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<form method="post" id="clientsForm">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add Client</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
							
								<div class="form-group mb-3">
									<label class="mb-2">Customer ID</label>
									<div class="input-group">
										<input type="text" name="customer_id" id="customer_id" class="form-control" placeholder="NRC / Passport" required>
										<input type="text" name="licence" id="licence" class="form-control" placeholder="Lincense Number" required>
									</div>
									<input type="hidden" name="ID" id="ID">
								</div>
								<div class="form-group mb-3">
									<label class="mb-2">Firstname & Lastname</label>
									<div class="input-group">
										<input type="text" name="firstname" id="firstname" class="form-control" placeholder="John" required>
										<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Zimba" required>
									</div>
								</div>
								<div class="form-group mb-3">
									<label class="mb-2">Did the Client Default Payment?</label>
									<select class="form-control" name="defaulted" id="defaulted" required>
										<option value="">Select Answer</option>
										<option value="0">No</option>
										<option value="1">YES</option>
									</select>
								</div>
								<div class="form-group mb-3" id="one" style="display: none;">
									<label class="mb-2">Date Defaulted</label>
									<input type="date" name="date_defaulted" id="date_defaulted" class="form-control">
								</div>
								<div class="form-group mb-3" id="two" style="display: none;">
									<label class="mb-2">Amount</label>
									<div class="input-group">
										<!-- <input type="text" name="currency" id="currency" class="form-control" placeholder="ZMW, USD"> -->
										<select class="form-control" name="currency" id="currency">
											<option value=""> Select Currency</option>
											<option value="ZMW">Zambian - ZMW</option>
											<option value="USD">United State of America - USD</option>
											<option value="RND">South Africa - RND</option>
										</select>
										<input type="number" name="amount_defaulted" id="amount_defaulted" class="form-control" step="any" min="0">
									</div>
								</div>
								<div class="form-group mb-3">
									<label class="mb-2">Remarks</label>
									<textarea class="form-control" rows="2" name="remarks" id="remarks"></textarea> 
									<em>Say Something about the customer</em>
									<input type="hidden" name="company_id" id="company_id" value="<?php echo $_SESSION['parent_id']?>">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" id="submit_customer" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End of Modal -->
			<!-- SearchModal -->
			<div class="modal fade bg-secondary" id="SearchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg ">
					<div class="modal-content">
						<form method="post" id="searchForm">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Check if Client is Blacklisted</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label class="mb-2">Enter NRC or License Number</label>
									<input type="text" name="nrc_lincense" id="nrc_lincense" class="form-control" placeholder="NRC / License">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" id="submit_customer" class="btn btn-primary">Search</button>
							</div>
						</form>
						<div class="col-md-12 p-4">
							<div id="search_result"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- End of SearchModal -->
					
			<div class="col-md-12 mt-2">
				<div class="card card-info">
					<div class="card-header">
						<h5 class="card-title">Listed Client's</h5>
					</div>
					<div class="card-body">
						<div class="table table-responsive">
							<table class="table table-striped" id="customersTable" style="width: 100%;">
								<thead>
									<tr>
										<th>Client Names</th>
										<th>NRC / Passport</th>
										<th>License</th>
										<th>Default Status</th>
										<th>Remarks</th>
										<th>Edit</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody id="data">
									<?php
										$company_id = $_SESSION['parent_id'];
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
												<td><a href="<?php echo $id?>" class="editCustomer text-decoration-none"> <i class="bi bi-pen"></i></a></td>
												<td><a href="<?php echo $id?>" class="deleteCustomer text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
											</tr>
										<?
											}
										}else{

										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
	<!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script> -->
	<script>
		$(function(){
			// $("#customersTable").DataTable({
		 //        dom: 'Bfrtip',
		 //        buttons: [
		 //            'copyHtml5',
		 //            'excelHtml5',
		 //            'csvHtml5',
		 //            'pdfHtml5',
		 //            'print'
		 //        ]
		 //    });
		    $("#customersTable").DataTable();
			$(document).on("change",  "#defaulted", function(e){
				var value = $(this).val();
				if (value === "1") {
					$("#one, #two").show();
				}else{
					$("#one, #two").hide();
				}
			})

			$("#clientsForm").submit(function(e){
				e.preventDefault();
				var clientsForm = document.getElementById('clientsForm');
				var data = new FormData(clientsForm);
				var url = 'includes/customerSubmit';
				$.ajax({
					url:url+'?<?php echo time()?>',
					method:"post",
					data:data,
					cache : false,
					processData: false,
					contentType: false,
					beforeSend:function(){
						$("#submit_customer").html("<i class='fa fa-spinner fa-spin'></i>");
					},
					success:function(data){
						errorNow(data);
						callListedClients("<?php echo $_SESSION['parent_id']?>");
						$("#submit_customer").html("Submit changes");
					}
				})
			})
		})
		

		$(document).on("click", ".editCustomer", function(e){
			e.preventDefault();
			var getCustomerId = $(this).attr("href");
			$("#exampleModal").modal("show");
			$.ajax({
				url:"includes/editCustomerData",
				method:"post",
				data:{getCustomerId:getCustomerId},
				dataType:"JSON",
				success:function(data){
					$("#ID").val(data.id);
					$("#firstname").val(data.firstname);
					$("#lastname").val(data.lastname);
					$("#customer_id").val(data.customer_id);
					$("#licence").val(data.licence);
					$("#defaulted").val(data.defaulted);
					$("#date_defaulted").val(data.date_defaulted);
					getD();
					$("#currency").val(data.currency);
					$("#amount_defaulted").val(data.amount_defaulted);
					$("#remarks").val(data.remarks);
				}
			})
		})

		function getD(){
			var get = $("#defaulted").val();
			if(get == 1) {
				$("#one, #two").show();
			}else{
				$("#one, #two").hide();
			}
		}

		$(document).on("click", ".deleteCustomer", function(e){
			e.preventDefault();
			var removeCustomerId = $(this).attr("href");
			if(confirm("You wish to remove the client")){
				$.ajax({
					url:"includes/editCustomerData",
					method:"post",
					data:{removeCustomerId:removeCustomerId},
					success:function(data){
						if (data === 'done') {
							successNow("Client Deleted");
							setTimeout(function(){
								location.reload();
							}, 2000);
						}else{
							errorNow(Data);
						}
					}
				})
			}else{
				return false;
			}
		})

		
		// ================================= DISPLAYS ======================================
		function callListedClients(parent_id){
			var company_id = parent_id;
			$.ajax({
				url:"includes/fetchCustomerData",
				method:"post",
				data:{company_id:company_id},
				success:function(data){
					$("#data").html(data);
				}
			})
		}
		callListedClients("<?php echo $_SESSION['parent_id']?>");

		function successNow(msg){
			toastr.success(msg);
	      	toastr.options.progressBar = true;
	      	toastr.options.positionClass = "toast-top-center";
	      	toastr.options.showDuration = 1000;
	    }

		function errorNow(msg){
			toastr.error(msg);
	      	toastr.options.progressBar = true;
	      	toastr.options.positionClass = "toast-top-center";
	      	toastr.options.showDuration = 1000;
	    }

	    // Search for client
	    
	    $(function(){
	    	$("#searchForm").submit(function(e){
				e.preventDefault();
				var searchForm = document.getElementById('searchForm');
				var data = new FormData(searchForm);
				var url = 'includes/searchCustomer';
				$.ajax({
					url:url+'?<?php echo time()?>',
					method:"post",
					data:data,
					cache : false,
					processData: false,
					contentType: false,
					beforeSend:function(){
						$("#submit_customer").html("<i class='fa fa-spinner fa-spin'></i>");
					},
					success:function(data){
						$("#search_result").html(data);
						$("#submit_customer").html("Submit changes");
					}
				})
			})
		})
	</script>
</body>
</html>