<!DOCTYPE html>
<html>
<head>
	<title>Thank you for adding your company to Car Hiring Reference Bureau</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
	<style type="text/css">
	.message {
		margin: 10em auto;
		padding: 3em;
		border-radius:5px;
    	
	}
	.boxes {
		width:50%;
    	margin:2em auto;
    	
	}
	i.bi {
		font-size: 2.5em;
		color: mediumseagreen;
	}
	@media(max-width:767px) {
    	.boxes {
    		width:100%;
    	}
	}
	
</style>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="message">
				<?php
					if (isset($_GET['message'])) {
						$msg = $_GET['message'];
						if($msg == "Activated"){?>
            				<div class="boxes">
						    	<h1 class="mb-3 text-success">You Account is Activated</h1>
                            	<p class="mb-3 fs-4">Thank you for registering with us. Incase of anything, reach me at: info@osabox.net or mutamuls@gmail.com</p>
                            	<div class="d-flex justify-content-between">
                            		<div class="">
						    			<i class="bi bi-check2-all"></i> <i class="bi bi-check2-circle"></i> <i class="bi bi-check2-square"></i>
						    		</div>
						    		<div>
                            			<p class="text-center mt-2"><a href="login" title="login" class="btn btn-secondary text-center"> Login </a></p>
                            		</div>
                            	</div>
            				</div>
					    <?php
						    
						}else{
						  echo $msg;  
						}
					}else{
						header("location:./");
					}
				?>
			</div>
		</div>
	</div>
</div>

</body>
</html>
