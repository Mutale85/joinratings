<?php
	include 'db.php';
	if (isset($_POST['client_details'])) {
		$client_id = $_POST['client_id'];
		$query = $connect->prepare("SELECT * FROM car_hiring_customers WHERE id = ?");
		$query->execute(array($client_id));

		$row = $query->fetch();
			extract($row);
			if($defaulted == 1){
				$status = '<span class="text-danger"> Defaulted </span>
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
			<div class="card_info">
			    <!-- <div class="img">
			      	<img src="https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDB8fGZhY2V8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
			    </div> 
			-->
			    <div class="infos">
			      	<div class="name">
			        	<h2><?php echo $firstname ?> <?php echo $lastname ?></h2>
			        	<h4><?php echo $customer_id ?></h4>
			      	</div>
			      	<p class="text"><?php echo $remarks?></p>
			      	<div class="stats">
			      		<table class="table table-borderless">
			      			<thead>
			      				<tr>
			      					<th>Email</th>
			      					<th>Phone</th>
			      					<th>Hiring Amount</th>
			      					<th>Status</th>
			      				</tr>
			      			</thead>
			      			<tbody>
			      				<tr>
			      					<td><?php echo $email;?></td>
						        	
						        	<td><?php echo $phone;?></td>
						        	
						        	<td><?php echo $currency;?> <?php echo $amount;?></td>
						        	
						        	<td><?php echo $status?></td>
			      				</tr>
			      			</tbody>
			      		</table>
			        	
			      	</div>
			      	<div class="links">
			        	<button class="follow rate_client_by_id" id="<?php echo $customer_id?>">Rate Client</button>
			        	<button class="view"><?php echo $rate?></button>
			      	</div>
			    </div>
			</div>
			
<?php
	}
?>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;700&display=swap');


.img img {
  max-width: 100%;
  display: block;
}
ul.stats {
  list-style: none;
}

/* Utilities */
.card_info::after,
.card_info img {
  border-radius: 50%;
}
body,
.card_info,
.stats {
  display: flex;
}

.card_info {
  padding: 2.5rem 2rem;
  border-radius: 10px;
  background-color: rgba(255, 255, 255, .5);
  /*max-width: 500px;*/
  box-shadow: 0 0 30px rgba(0, 0, 0, .15);
  margin: 1rem;
  position: relative;
  transform-style: preserve-3d;
  overflow: hidden;
}
.card_info::before,
.card_info::after {
  content: '';
  position: absolute;
  z-index: -1;
}
.card_info::before {
  width: 100%;
  height: 100%;
  border: 1px solid #FFF;
  border-radius: 10px;
  top: -.7rem;
  left: -.7rem;
}
.card_info::after {
  height: 15rem;
  width: 15rem;
  background-color: #4172f5aa;
  top: -8rem;
  right: -8rem;
  box-shadow: 2rem 6rem 0 -3rem #FFF
}

.card_info img {
  width: 8rem;
  min-width: 80px;
  box-shadow: 0 0 0 5px #FFF;
}

.infos {
  margin-left: 1.5rem;
}

.name {
  margin-bottom: 1rem;
}
.name h2 {
  font-size: 1.3rem;
}
.name h4 {
  font-size: .8rem;
  color: #333
}

.text {
  font-size: .9rem;
  margin-bottom: 1rem;
}

.stats {
  margin-bottom: 1rem;
}
.stats li {
  min-width: 5rem;
}


.links button {
  font-family: 'Poppins', sans-serif;
  min-width: 120px;
  padding: .5rem;
  border: 1px solid #222;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
  transition: all .25s linear;
}
.links .follow,
.links .view:hover {
  background-color: #222;
  color: #FFF;
}
.links .view,
.links .follow:hover{
  background-color: transparent;
  color: #222;
}

@media screen and (max-width: 450px) {
  	.card_info {
    	display: block;
  	}
  .infos {
    margin-left: 0;
    margin-top: 1.5rem;
  }
  .links button {
    min-width: 100px;
  }
}
</style>