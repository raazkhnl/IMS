<?php 
	// session_start();
	require_once 'core/init.php';
	require_once 'includes/header.php';
?>

<?php 
	if(!isset($_SESSION['logged_in'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
        echo "<script>window.open('','_self')</script>";
    }
?>

<?php
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM customers WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $cus_id = $row_pro['id'];
          $cus_name = $row_pro['fullname'];
          $cus_email = $row_pro['email'];
          $cus_address1 = $row_pro['address1'];
          $cus_city = $row_pro['city'];
          $cus_phone = $row_pro['phone'];
    }
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>My Profile</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your emptom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">  
</head>
<body>
	
	<?php 
			if (!isset($_GET['edit_account'])) {
				if(!isset($_GET['change_password'])){
					if(!isset($_GET['delete_account'])){
						echo 
						"
							<div class='card' style=''>
								<div class='card-header'>
									<a href = './upcoming.php' class = 'btn-sm btn-primary'><i class='fas fa-arrow-circle-down'> Upcoming Interview</i></a>
									<a href = './history.php' class = ' m-3 btn-sm btn-secondary'><i class='fas fa-history'> View History</i></a>
								</div>
								<div class='card-body table-responsive'>
									<table class='table table-striped table-condensed' style='display: table'>
										
										<tr>
											<th><b>Name: </b></th>
											<td>$cus_name</td>
										</tr>
										<tr>
											<th><b>Phone: </b></th>
											<td>$cus_phone</td>
										</tr>
										<tr>
											<th><b>Email: </b></th>
											<td>$cus_email</td>
										</tr>
										<tr>
											<th><b>Address: </b></th>
											<td>$cus_address1</td>
										</tr>
										<tr>
											<th><b>City: </b></th>
											<td>$cus_city</td>
										</tr>
										
										
									</table>
								</div>
							</div>
						";
					}
				}
			}
		
	?>
	
</body>
</html>
<?php require_once 'includes/footer.php';?>
