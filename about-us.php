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
					<img src="images/undraw_business_deal_re_up4u.svg" class="img-fluid trust1" alt="trust1">
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-warning p-4">
		<div class="container">
			<div class="main_section">
				<div class="row text-dark">
					<div class="col-md-6 mb-5 text-secondarys text-center">
						<div class="wells">
							<h2 class="mb-3"><i class="bi bi-search"></i> Search Requests</h2>
							<p class="fs-5">Do have clients or potential clients that have called requesting to rent your vehicles from you? Risking is too high, check their credibility and rating before you deal with them. </p>
							<p class="fs-5">Just ask for their NRC and search them through our database and see if they have any pending issues with other companies before entrusting them with your vehicle.</p>
						</div>
					</div>
					<div class="col-md-6">
						<img src="images/undraw_file_searching_re_3evy.svg" class="img-fluid trust1" alt="trust1">
					</div>
				</div>
			</div>
		</div>
		<!-- J*5e--Gc-8wE5%+l -->
	</div>
	<div class="container-fluid bg-secondary p-4">
		<div class="container">
			<div class="main_section">
				<div class="row text-white">
					<div class="col-md-6">
						<img src="images/undraw_uploading_re_okvh.svg" class="img-fluid trust1" alt="trust1">
					</div>
					<div class="col-md-6 text-secondarys text-center">
						<div class="wells">
							<h2 class="mb-3"><i class="bi bi-journal-plus"></i> Listing Clients</h2>
							<p class="fs-5">Have you leased your car? List it on the platform and help others and earn yourself some points to search for clients before issuing them with your vehicle.</p>
							<p class="fs-5">Each listing attract search points for you to query the database for your next customer.</p> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-info p-4">
		<div class="container">
			<div class="main_section">
				<div class="row text-white">
					<div class="col-md-3 mb-5 text-secondarys text-center">
						<div class="wells">
							<h2 class="mb-3"><i class="bi bi-circle-square"></i> Determine</h2>
							<p class="fs-5">We are here to help you find safety with your Car and your money, we provide you with data and you determine if you can trust the client to do business to lease them your car.</p>
						</div>
					</div>
					<div class="col-md-3 mb-5 text-secondarys text-center">
						<div class="wells">
							<h2 class="mb-3"><i class="bi bi-hand-thumbs-up"></i> Trust</h2>
							<p class="fs-5"> If the client default or break the rules, in the dashboard you mark them as defaulter and give them a <i class="bi bi-star-fill text-warning"></i> rating that you think is appropriate. </p>
						</div>
					</div>
					<div class="col-md-6">
						<img src="images/undraw_add_notes_re_ln36.svg" class="img-fluid trust1" alt="trust1">
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
					<p class="fs-5">We give you the power to list a client on our database, we also give you an opportunity to vet a potential client before you entrust them with your car or money.</p>
					<p class="fs-5">You are in control of the listing, you can edit the listing and let us know if you wish to delete the it as we give a dashboard to manage your listings.</p>
					<p class="fs-5">While CRB focuses on big companies, we are here for you no matter your size.</p>
				</div>
			</div>
		</div>
	</div>
	<?php include("support/footer.php") ?>
</body>
</html>