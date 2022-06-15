<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
    <style>
    	textarea {
    		resize: none;
    	}
    </style>
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
                            <div class="card p-3">
                                <div class="card-header">Add Client
                                    <div class="btn-actions-pane-right">
                                    	
                                    </div>
                                </div>
                                <div class="card-body">
                                	<?php
                                		$row_id = $customer_id = $licence = $vehicle_reg_number = $firstname = $lastname = $phone = $email = $address = $remarks = $amount_defaulted = $date_defaulted = $status_field = ""; 
                                		if (isset($_GET['client-id'])) {
                                			$client_id = base64_decode($_GET['client-id']);
                                			$query = $connect->prepare("SELECT * FROM money_lending_customers WHERE id = ? AND company_id = ? ");
											$query->execute(array($client_id, $parent_id));
											$row = $query->fetch();
											extract($row);
											$row_id = $id;
											if ($defaulted == '1') {
												$option = '<option value="">Select</option><option value="1" selected>Yes</option><option value="0">No</option>';
											}else{
												$option = '<option value="">Select</option><option value="1">Yes</option><option value="0" selected>No</option>';
											}
                                		}
                                	?>
                                    <form method="post" id="clientsForm" enctype="multipart/form-data">
                                    	<div class="row">
											<div class="form-group mb-3 col-md-4">
												<label class="mb-2">First Names</label>
												
												<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $firstname?>" placeholder="John" required>
											</div>
											<div class="form-group col-md-4">
												<label class="mb-2">Surname</label>
												<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $lastname?>" placeholder="Zimba" required>
											</div>
											<div class="form-group mb-3 col-md-4">
												<label class="mb-2">NRC No.</label>
												<div class="input-group">
													<input type="text" name="customer_id" id="customer_id" class="form-control" placeholder="NRC Number" value="<?php echo $customer_id?>" required>
												</div>
												<input type="hidden" name="ID" id="ID" value="<?php echo $row_id?>">
											</div>
											<div class="form-group col-md-4">
												<label class="mb-2">Phone</label>
												<input type="text" name="phone" id="phone" class="form-control" placeholder="260..." value="<?php echo $phone?>">
											</div>
											<div class="form-group col-md-4">
												<label class="mb-2">Email</label>
												<input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" value="<?php echo $email?>">
											</div>
											
											<div class="form-group mb-3 col-md-4">
												<label class="mb-2">Known Address</label>
												<textarea class="form-control" rows="4" name="address" id="address"> <?php echo $address?></textarea> 
											</div>
											
											<div class="form-group mb-3 col-md-3" id="one">
												<label class="mb-2">Date Borrowed</label>
												<input type="date" name="date_borrowed" id="date_borrowed" class="form-control" value="<?php echo $date_defaulted?>">
											</div>
											<div class="form-group mb-3 col-md-3" id="one">
												<label class="mb-2">Date Defaulted</label>
												<input type="date" name="date_defaulted" id="date_defaulted" class="form-control" value="<?php echo $date_defaulted?>">
											</div>
											<div class="form-group mb-3 col-md-3" id="two">
												<label class="mb-2">Amount Borrowed</label>
												<div class="input-group">
													<select class="form-control" name="currency" id="currency">
														<option value="ZMW">Zambian - ZMW</option>
														<option value="USD">USA - USD</option>
														<option value="RND">South Africa - RND</option>
													</select>
													<input type="number" name="amount" id="amount" class="form-control" value="<?php echo $amount?>" step="any" min="0" required>
												</div>
											</div>
											<?php if (isset($_GET['client-id'])) {?>
											<div class="form-group mb-3 col-md-3">
												<label class="mb-2">Did the Client Default Payment?</label>
												<select class="form-control" name="defaulted" id="defaulted" required>
													<?php echo $option ?>
												</select>
											</div>
										<?php }else{?>
											<div class="form-group mb-3 col-md-3">
												<label class="mb-2">Did the Client Default Payment?</label>
												<select class="form-control" name="defaulted" id="defaulted" required>
													<option value="">Select</option>
													<option value="1">Yes</option>
													<option value="0">No</option>
												</select>
											</div>
										<?php }?>
											<div class="form-group mb-3 col-md-12">
												<label class="mb-2">Remarks</label>
												<textarea class="form-control" rows="4" name="remarks" id="remarks" placeholder="Describe nature of the debt"><?php echo $remarks?></textarea> 
												<input type="hidden" name="company_id" id="company_id" value="<?php echo $_SESSION['parent_id']?>">
											</div>
											
											<?php
												if ($nrc_copy == "") {?>
													<div class="form-group mb-3 col-md-6">
														<label>Client NRC Copy</label>
														<input type="file" name="nrc_copy" id="nrc_copy" class="form-control" required accept="image/*,.pdf">
													</div>
													
											<?php }?>
											
											<?php
												if ($borrowing_proof == "") {?>
											<div class="form-group mb-3 col-md-6">
												<label>Proof of Borrowing</label>
												<input type="file" name="borrowing_proof" id="borrowing_proof" class="form-control" accept=".pdf">
											</div>
												<?php } ?>
										</div>
										<button type="submit" id="submit_customer" class="button-34 mt-4">Submit Client</button>
									</form>
                                </div>
                                <div class="d-flex justify-content-between card-footer">
                                	<p>This information will be shared amongs other institutions that may be likely to lend money to this client. </p>
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
						// setTimeout(function(){
						// 	location.reload();
						// }, 2000);
						$("#clientsForm")[0].reset();
						callDashBoard();
						$("#submit_customer").html("Submit changes");
					}
				})
			})
    	})
    	
    </script>
</body>
</html>
