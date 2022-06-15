<!DOCTYPE html>
<html>
<head>
    <?php include("support/header.php");
    include 'includes/db.php';
    ?>
</head>
<body>
    <?php include("support/nav.php")?>
    <div class="container mt-5">
        <div class="main_section">
            <div class="row">
                <div class="col-md-6">
                    <h1>How it Works</h1>
                    <p>You must be registered member, if not, <a href="register" title="register">CLICK HERE</a></p>
                    <p>You must have credit for searching -  If you don't have, add a client and get free credit or buy credit.</p>
                </div>
                <div class="col-md-6 mt-5">
                      <?php
                        $email = $client_nrc = "";
                        if (isset($_GET['email']) && isset($_GET['client_nrc'])) {
                            $email          = $_GET['email'];
                            $client_nrc    = trim($_GET['client_nrc']);
                        }
                      ?>
                    <div class="searchDiv">
                        <div class="mb-3 text-secondary text-center">
                            <h2>Search Client</h2>
                        </div> 
                        <form id="searchForm" method="get" class="form-inline">
                            <div class="form-group mb-3">
                                <!-- <label class="mb-2" for="email">Your Email</label> -->
                                <input type="email" name="email" id="email" class="form-control" required placeholder="Your Registered Email" value="<?php echo $email?>">
                            </div>
                            <div class="form-group mb-3">
                                <!-- <label class="mb-2" for="client_nrc">NRC for Client</label> -->
                                <input type="text" name="client_nrc" id="client_nrc" class="form-control" required placeholder="Check Client's NRC" autocomplete="off" value="<?php echo $client_nrc?>">
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button id="submitBtn" type="submit" class="button-34">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row rsesult">
                <div class="col-md-12">
                    <?php
                        if (isset($_GET['email']) && isset($_GET['client_nrc'])) {

                            $email          = $_GET['email'];
                            $customer_id    = trim($_GET['client_nrc']);
                            $parent_id      = getParentId($connect, $email);

                            $query = $connect->prepare("SELECT * FROM members WHERE email = ? ");
                            $query->execute(array($email));
                            if($query->rowCount() > 0){

                                $query = $connect->prepare("SELECT * FROM car_hiring_customers WHERE customer_id = ? ");
                                $query->execute(array($customer_id));
                                $rowcount = $query->rowCount();
                                if ($rowcount > 0) {?>
                                    <div class="mt-5">
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h5 class="card-title">Search Result</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table table-responsive">
                                                    <table class="table table-striped" id="customersTable" style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Client Names</th>
                                                                <th>Client ID</th>
                                                                <th>License</th>
                                                                <th>Default Status</th>
                                                                <th>Remarks</th>
                                                                <th>Listed By</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="search_result">
                                                        <?php
                                                            foreach ($query->fetchAll() as $row) {
                                                                extract($row);
                                                                if($defaulted == 1){
                                                                    $status = '<span class="text-danger">Defaulted</span>
                                                                            '; 
                                                                }else{
                                                                    $status = 'Cleared';
                                                                }
                                                                if($rating == 0){
                                                                    $rate = '<i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>'; 
                                                                }elseif($rating == 1){
                                                                    $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>';
                                                                }elseif ($rating == 2) {
                                                                    $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>';
                                                                }elseif ($rating == 3) {
                                                                    $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>';
                                                                }elseif ($rating == 4) {
                                                                    $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star"></i>';
                                                                }elseif ($rating == 5) {
                                                                    $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i>';
                                                                }
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $firstname ?> <?php echo $lastname ?></td>
                                                                <td><?php echo $customer_id ?></td>
                                                                <td><?php echo $licence ?></td>
                                                                <td><?php echo $status?></td>
                                                                <td><?php echo $rate?></td>
                                                                <td><?php echo getCompanyName($connect, $company_id)?></td>
                                                            </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <script>
                                        callDashBoard();
                                    </script> -->
                            <?php   
                                }else{
                                    $query = $connect->prepare("SELECT * FROM money_lending_customers WHERE customer_id = ? ");
                                    $query->execute(array($customer_id));
                                    $rowcount = $query->rowCount();

                                    if ($rowcount > 0) {?>
                                        <div class="mt-5">
                                            <div class="card card-info">
                                                <div class="card-header">
                                                    <h5 class="card-title">Search Result</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table table-responsive">
                                                        <table class="table table-striped" id="customersTable" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Client Names</th>
                                                                    <th>Client ID</th>
                                                                    <th>Default Status</th>
                                                                    <th>Remarks</th>
                                                                    <th>Listed By</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="search_result">
                                                            <?php
                                                                foreach ($query->fetchAll() as $row) {
                                                                    extract($row);
                                                                    if($defaulted == 1){
                                                                        $status = '<span class="text-danger">Defaulted</span>
                                                                                '; 
                                                                    }else{
                                                                        $status = 'Cleared';
                                                                    }
                                                                    if($rating == 0){
                                                                        $rate = '<i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>'; 
                                                                    }elseif($rating == 1){
                                                                        $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>';
                                                                    }elseif ($rating == 2) {
                                                                        $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>';
                                                                    }elseif ($rating == 3) {
                                                                        $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>';
                                                                    }elseif ($rating == 4) {
                                                                        $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star"></i>';
                                                                    }elseif ($rating == 5) {
                                                                        $rate = '<i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i><i class="bi bi-star-fill text-primary"></i>';
                                                                    }
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $firstname ?> <?php echo $lastname ?></td>
                                                                    <td><?php echo $customer_id ?></td>
                                                                    <td><?php echo $status?></td>
                                                                    <td><?php echo $rate?></td>
                                                                    <td><?php echo getCompanyName($connect, $company_id)?></td>
                                                                </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <script>
                                            callDashBoard();
                                        </script> -->
                                <?php   
                                    }else{?>
                                        <div class="mt-5 resultsDiv">
                                            <p class="fs-5"> No information found for the client whose NRC number is: <b><?php echo $customer_id ?></b> </p>
                                        </div>
                                        <!-- <script>
                                            callDashBoard();
                                        </script> -->
                            <?php       
                                    }

                                }
                            }else{?>
                                <div class="col-md-12 mt-5  resultsDiv">
                                    <p class="fs-5">Please create your account and earn 10 free search credit.</p>
                                </div>
                        <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".hamburger").click(function(){
                $(this).toggleClass("is-active");
            });
        });
    </script>
</body>
</html>