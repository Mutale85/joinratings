<?php
	include("includes/db.php"); 
	if(!isset($_SESSION['email'])){?>
	<script>
      window.location = '../signout';
    </script>
<?php	
	}
	$parent_id = $_SESSION['parent_id'];
	$user_id   = $_SESSION['user_id'];
	$fullnames = $_SESSION['fullnames'];
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php echo getCompanyName($connect, $parent_id)?> Dashboard.</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="description" content="This is an example dashboard created using build-in elements and components.">
<meta name="msapplication-tap-highlight" content="no">
<link href="../css/adminCss.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="../css/buttons.css">
<link rel="icon" type="../images/Logo2.png" href="../images/Logo2.png">