<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include("logo.php");?>      
        <div class="app-main">
            <!-- include navigation -->
            <?php include 'nav.php'; ?>
            <!-- end of nav -->    
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                                <div>Checklist Dashboard
                                    <div class="page-title-subheading">Every Search tokens are deducted, while every addition attracts free search tokens
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="<?php echo $_SESSION['business_type']?>" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                            </div>    
                        </div>
                    </div>            
                    <!-- DASHEBOARD -->
                    <span class="Dashboard" id="Dashboard"></span>           
                    <!-- DASHEBOARD -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Added Clients
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <a href="submit-new-client" class="active btn btn-focus">Add New Client</a>
                                            <a href="search" class="btn btn-focus">Search Client</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="customersTable">
                                            <thead>
												<tr>
													<th>Client Names</th>
													<th>Details</th>
													<th>Edit</th>
												</tr>
											</thead>
											<tbody id="customersData">
												<?php
													$company_id = $_SESSION['parent_id'];
													$query = $connect->prepare("SELECT * FROM car_hiring_customers WHERE company_id = ?");
													$query->execute(array($company_id));
													if ($query->rowCount() > 0) {
														foreach ($query->fetchAll() as $row) {
															extract($row);
															if($defaulted == 1){
																$status = '<span class="text-danger">Defaulted</span>
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
															<td><?php echo $firstname;?> <?php echo $lastname;?></td>
															<td><a href="<?php echo $id?>" class="text-decoration-none view_details">View Details</a></td>
															</td>
															<td><a href="edit-client?client-id=<?php echo base64_encode($id);?>" class="editCustomers text-decoration-none"> <i class="bi bi-pen"></i></a></td>
															
														</tr>
													<?php
														}
													}else{

													}
												?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-block d-flex justify-content-between card-footer">
                                    <!-- <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="bi bi-plus"> </i> Add New Client</button>
                                    <button class="btn-wide btn btn-success">Search Client</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FOOTER -->
                <?php include 'footer.php'; ?> 
                <!-- FOOTER END -->
            </div>
        </div>
    </div>
	
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
					$("#customersData").html(data);
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

	    $(document).on("click", ".rate_client", function(e){
	    	e.preventDefault();
	    	var client_id = $(this).attr("id");

		    var rating = prompt("Please enter a number between 1 - 5", "");

			if (rating != null) {
			  	// document.getElementById("demo").innerHTML =
			  	if (!isNaN(rating)) {
				  //it's a number
				  	//send to ratings 
				  	$.ajax({
				  		url:"includes/ratings",
				  		method:"post",
				  		data:{client_id:client_id, rating:rating},
				  		success:function(data){
				  			successNow(data);
				  			callListedClients("<?php echo $_SESSION['parent_id']?>");
				  		}
				  	})

				}else{
					errorNow("Please only numbers between 1 and 5 are allowed");
				}
			  	
			}
		})

	    $(document).on('click', '.view_details', function(e){
	    	e.preventDefault();
	    	var client_id = $(this).attr("href");
	    	var client_details = 'client_details';
	    	$.ajax({
		  		url:"includes/clientDetails",
		  		method:"post",
		  		data:{client_id:client_id, client_details:client_details},
		  		success:function(data){
		  			$("#client_details").html(data);
		  			$("#clientModal").modal("show");
		  		}
		  	})
	    })
		
	</script>
</body>
</html>
<?php include "modal.php" ?>
