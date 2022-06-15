<!DOCTYPE html>
<html>
<head>
	<?php include("support/header.php")?>
</head>
<body>
	<?php include("support/nav.php")?>
	<div class="container mt-5">
		<div class="main_section">
			<div class="row">
				<div class="col-md-6 mt-5">
					<div class="mt-5 text-secondary text-center">
						<!-- <h1><a href="./" title="home" class="text-decoration-none text-warning">Checklistr</a></h1> -->
						<h1>Your Journey Starts Here </h1>
						<p class="fs-5"> Create your account and start earning points when you submit a client</p>
					</div>
				</div>
				<div class="col-md-6 mt-5">
					<div class="bg-secondary text-white p-3 rounded-3 shadow">
						<h2 class="mb-5 border-bottom pb-3 text-center">Register</h2>
						<form id="registerForm" method="post">
							<div class="form-group mb-3">
				       			<label class="mb-2" for="username">Full names</label>
								<input type="text" name="fullnames" id="fullnames" class="form-control" required placeholder="John Banda">
				       		</div>

				       		<div class="form-group mb-3">
				       			<label class="mb-2" for="email">Email</label>
				   				<input type="email" name="email" id="email" class="form-control" required placeholder="Email" autocomplete="off">
				   				<input type="hidden" name="currency" id="currency" value="USD">
				       		</div>
				       	
				       		<div class="form-group mb-3">
				       			<label class="mb-2" for="password">Password </label>
				       			<div class="input-group">
				       				<input type="password" name="password" id="password" class="form-control" required  autocomplete="off" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
				       				<span class="input-group-text" id="showpass_text" onclick="passReveal()"><i class="bi bi-eye"></i></span>
				       			</div>
				       		</div>
				       		<div class="form-group mb-3">
				       			<label class="mb-2" for="username">Company Name Or Username</label>
								<input type="text" name="company_name" id="company_name" class="form-control" required placeholder="Business Name">
				       		</div>
				       		<div class="form-group mb-3">
				       			<label class="mb-2" for="username">Type of Business</label>
								<select class="form-control" name="business_type" id="business_type">
									<option disabled selected> Choose </option>
									<option value="Car Hiring">Car Hiring</option>
									<option value="Money Lending"> Money Lending</option>
								</select>
				       		</div>
				       		<div class="form-check mb-3">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
								<label class="form-check-label" for="flexCheckDefault">
									I agree to <a href="policy/terms-of-use" class="text-decoration-none text-warning" title="terms"> Terms </a> 
								</label>
							</div>
				       		<div class="d-flex justify-content-between mt-4">
				       			<button id="submitBtn" type="submit" class="button-34">Submit</button>
				       			<a href="login" class=" text-decoration-none text-warning" title="login">Already a member? Login</a>
				       		</div>
						</form>
						<div id="result"></div>
						<div id="message" class="mt-4">
							<h3>Password must contain the following:</h3>
							<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							<p id="number" class="invalid">A <b>number</b></p>
							<p id="length" class="invalid">Minimum <b>8 characters</b></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var showpass = document.getElementById('showpass_text');
		var password = document.getElementById('password');
		function passReveal(){
			var password = document.getElementById('password');
		    if(password.type == 'password') {
		        password.type = 'text';
		        showpass.innerHTML = '<i class="bi bi-eye-slash"></i>';
		    }else {
		        password.type = 'password';
		        showpass.innerHTML = '<i class="bi bi-eye"></i>';
		    }
		}


		$(document).ready(function(){
			$("#registerForm").submit(function(e){
				e.preventDefault();
				alert("Hello");
				var url = 'includes/registerMember';
				$.ajax({
					url:url,
					method:"POST",
					data:$(this).serialize(),
					beforeSend:function(){
						$("#submitBtn").html("Please Wait...");
					},
					success:function(data){
						
						// successNow(data);
						$("#result").html(data);
						$("#submitBtn").html("Submit");
						
					}
				})
			})
		})
	</script>
	<script>
		var myInput = document.getElementById("password");
		var letter = document.getElementById("letter");
		var capital = document.getElementById("capital");
		var number = document.getElementById("number");
		var length = document.getElementById("length");

		// When the user clicks on the password field, show the message box
		myInput.onfocus = function() {
		  document.getElementById("message").style.display = "block";
		}

		// When the user clicks outside of the password field, hide the message box
		myInput.onblur = function() {
		  document.getElementById("message").style.display = "none";
		}

		// When the user starts to type something inside the password field
		myInput.onkeyup = function() {
		  // Validate lowercase letters
		  var lowerCaseLetters = /[a-z]/g;
		  if(myInput.value.match(lowerCaseLetters)) {  
		    letter.classList.remove("invalid");
		    letter.classList.add("valid");
		  } else {
		    letter.classList.remove("valid");
		    letter.classList.add("invalid");
		  }
		  
		  // Validate capital letters
		  var upperCaseLetters = /[A-Z]/g;
		  if(myInput.value.match(upperCaseLetters)) {  
		    capital.classList.remove("invalid");
		    capital.classList.add("valid");
		  } else {
		    capital.classList.remove("valid");
		    capital.classList.add("invalid");
		  }

		  // Validate numbers
		  var numbers = /[0-9]/g;
		  if(myInput.value.match(numbers)) {  
		    number.classList.remove("invalid");
		    number.classList.add("valid");
		  } else {
		    number.classList.remove("valid");
		    number.classList.add("invalid");
		  }
		  
		  // Validate length
		  if(myInput.value.length >= 8) {
		    length.classList.remove("invalid");
		    length.classList.add("valid");
		  } else {
		    length.classList.remove("valid");
		    length.classList.add("invalid");
		  }
		}
	</script>
</body>
</html>