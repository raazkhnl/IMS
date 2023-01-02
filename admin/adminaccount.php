<?php 
	// session_start();
	require_once '../core/init.php';
	require_once 'includes/header.php';
?>

<?php 
	if(!isset($_SESSION['admin_logged_in'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
        echo "<script>window.open('','_self')</script>";
    }
?>

<?php
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $admin_id = $row_pro['id'];
          $admin_name = $row_pro['fullname'];
          $admin_email = $row_pro['email'];
    }
?>
<html lang="en">
<body>
	
	<?php 
			if (!isset($_GET['edit_account'])) {
				if(!isset($_GET['change_password'])){
					if(!isset($_GET['delete_account'])){
						echo 
						"
							<div class='card' style=''>
								<div class='card-body table-responsive'>
									<table class='table table-striped table-condensed' style='display: table'>
										
										<tr>
											<th><b>Name: </b></th>
											<td>$admin_name</td>
										</tr>
										<tr>
											<th><b>Email: </b></th>
											<td>$admin_email</td>
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