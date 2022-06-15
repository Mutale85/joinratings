<?php 
	include("includes/db.php");
	if (isset($_SESSION['email'])) {

		if ($_COOKIE['LoggedInUserType'] == 'Car Hiring') {
			header("location:car-hiring/");
		}elseif ($_COOKIE['LoggedInUserType'] == 'Money Lending') {
			header("location:money-lending/");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("support/header.php")?>
</head>
<body>
	<?php include ("support/nav.php"); ?>
	<div class="container mt-5">
		<div class="main_section">
			<div class="row">
				<div class="col-md-6 text-secondary div-intro">
					<h1 class="mb-4">Let <span class="primary-text">data</span> avert the risk</h1>
					<p class="fs-5">Join Ratings is here to help you search for credibility of the person or firm you wish to lend your car or money to.</p>
					<p class="fs-5">List - Search - Determine - Trust</p>
					<div class="mt-5 mb-5">
						<a href="search" title="login" class="button-17 text-decoration-none border border-primary shadow">Start Checking &nbsp;<i class="bi bi-arrow-right"></i></a>
					</div>
				</div>
				<div class="col-md-6">
					<img src="images/trust1.jpeg" class="img-fluid trust1" alt="trust1">
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-secondary p-4">
		<div class="container">
			<div class="main_section">
				<div class="row text-white">
					<div class="col-md-12 mb-5">
						<h2>How Does it Work?</h2>
					</div>
					<div class="col-md-3 mb-5 text-secondarys text-center">
						<div class="wells">
							<h2 class="mb-3"><i class="bi bi-journal-plus"></i> Listing Clients</h2>
							<p class="fs-6">Join ratings gives you an opportunity to list a client who has borrowed a car for a fee, or whom you have lent some money. Once they pay, you can rate them with <span  class="text-warning"><br> 1 - 5 <i class="bi bi-star-fill"></i></span> stars for their credibility.</p>
						</div>
					</div>
					<div class="col-md-3 mb-5 text-secondarys text-center">
						<div class="wells">
							<h2 class="mb-3"><i class="bi bi-search"></i> Search Requests</h2>
							<p class="fs-6">Have you received a request for a car hire? or someone wishes you to lend them money? The high returns are attractive, but before you proceed, check their <i class="bi bi-star-fill text-warning"></i> rating in our database.</p>
						</div>
					</div>
					<div class="col-md-3 mb-5 text-secondarys text-center">
						<div class="wells">
							<h2 class="mb-3"><i class="bi bi-circle-square"></i> Determine</h2>
							<p class="fs-6">We are here to help you find safety with your Car and your money, we provide you with data and you determine if the client has enough <i class="bi bi-star-fill text-warning"></i> rating for you to do business with them.</p>
						</div>
					</div>
					<div class="col-md-3 mb-5 text-secondarys text-center">
						<div class="wells">
							<h2 class="mb-3"><i class="bi bi-hand-thumbs-up"></i> Trust</h2>
							<p class="fs-6"> If the client default or break the rules, in the dashboard you mark them as defaulter and give them a <i class="bi bi-star-fill text-warning"></i> rating that you think is appropriate. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">

		<div class="main_section">
			<div class="row">
				<div class="col-md-12">
					<h3>We are not CRB</h3>
					<p>We give you the power to list a client on our database, we also give you an opportunity to vet a potential client before you entrust them with your car or money.</p>
					<p>You are in control of the listing, you can edit the listing or delete it as we give a dashboard to manage your listings.</p>
					<p>While CRB focuses on big companies, we are here for you no matter your size.</p>
				</div>
			</div>
		</div>
	</div>
	<?php include("support/footer.php") ?>
</body>
</html>