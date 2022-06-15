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
                                <div>Adding Dashboard
                                    <div class="page-title-subheading">Earn Search tokens by adding clients to the system. Offer is limited
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
                                <div class="card-header">Add Client
                                    <div class="btn-actions-pane-right">
                                    	
                                    </div>
                                </div>
                                <div class="card-body">
                                	
                                    <form method="post" id="clientsForm">
                                    	<div class="row">
                                    		<div class="form-group mb-3 col-md-6">
												<label class="mb-2">First name</label>
												<input type="text" name="firstname" id="firstname" class="form-control" placeholder="John" required>
											</div>
											<div class="form-group mb-3 col-md-6">
												<label class="mb-2">Last name</label>
												<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Zimba" required>
											</div>
											<div class="form-group mb-3 col-md-6">
												<label class="mb-2">NRC No.</label>
												<input type="text" name="customer_id" id="customer_id" class="form-control" placeholder="NRC / Passport" required>
											</div>
											<div class="form-group mb-3 col-md-6">
												<label>License Number</label>
												<input type="text" name="licence" id="licence" class="form-control"  placeholder="Lincense No." required>
											</div>
											<div class="form-group col-md-2">
												<label class="mb-2">Phone</label>
												<input type="text" name="phone" id="phone" class="form-control" placeholder="260...">
											</div>
											<div class="form-group col-md-2">
												<label class="mb-2">Email</label>
												<input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" >
											</div>
											
											<div class="form-group mb-3 col-md-2">
												<label>Borrowed Vehicle</label>
												<input type="text" name="vehicle_reg_number" id="vehicle_reg_number" class="form-control" placeholder="Enter Reg Number">
											</div>
											<div class="form-group mb-3 col-md-2" id="one">
												<label class="mb-2">Date </label>
												<input type="date" name="date_defaulted" id="date_defaulted" class="form-control">
											</div>
											<div class="form-group mb-3 col-md-2" id="two">
												<label class="mb-2">Amount being Submitted</label>
												<div class="input-group">
													<select class="form-control" name="currency" id="currency">
														<option value="ZMW">Zambian - ZMW</option>
														<option value="USD">United State of America - USD</option>
														<option value="RND">South Africa - RND</option>
													</select>
													<input type="number" name="amount" id="amount" class="form-control" step="any" min="0">
												</div>
											</div>
											
											<div class="form-group mb-3 col-md-2">
												<label class="mb-2">Client Defaulted?</label>
												<select class="form-control" name="defaulted" id="defaulted" required>
													<option value="">Select</option>
													<option value="1">Yes</option>
													<option value="0">No</option>
												</select>
											</div>
											<div class="form-group mb-3 col-md-6">
												<label class="mb-2">Address</label>
												<textarea class="form-control" rows="2" name="address" id="address" placeholder="Known Address"></textarea> 
											</div>
											<div class="form-group mb-3 col-md-6">
												<label class="mb-2">Remarks</label>
												<textarea class="form-control" rows="2" name="remarks" id="remarks" placeholder="Say Something about the customer"></textarea> 
												<input type="hidden" name="company_id" id="company_id" value="<?php echo $_SESSION['parent_id']?>">
											</div>
											<div class="form-group mb-3 col-md-6">
												<label>Client NRC Copy</label>
												<input type="file" name="nrc_copy" id="nrc_copy" class="" required accept="image/*,.pdf">
												<em>Required</em>
											</div>
											<div class="form-group mb-3 col-md-6">
												<label>Client License</label>
												<input type="file" name="license_file" id="license_file" class="" accept=".pdf">
												<em>Optional</em>
											</div>
										</div>
										<button type="submit" id="submit_customer" class="button-34">Submit Customer</button>
									</form>
                                </div>
                                <div class="d-flex justify-content-between card-footer">
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
						
						callDashBoard();
						$("#clientsForm")[0].reset();
						$("#submit_customer").html("Submit changes");
					}
				})
			})
    	})
    </script>
</body>
</html>
<?php include "modal.php" ?>
