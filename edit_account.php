<?php 
	require_once('./core/init.php');
	require_once './includes/header.php';
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
<div class="container-fluid p-2 col-md-8">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Edit Account</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="" enctype="multipart/form-data">
					<div class="row">					
						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <label for="fullname">Full Name</label><br>
				              <input type="text" id="fullname" class="form-control form-control-sm" name="fullname" value="<?php echo $cus_name;?>">
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <label for="email">Email</label><br>
				              <input type="email" id="email" class="form-control form-control-sm" name="email" value="<?php echo $cus_email;?>">
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-map prefix"></i>
				              <label for="address1">Address1</label><br>
				              <input type="text" id="address1" class="form-control form-control-sm" name="address1" value="<?php echo $cus_address1;?>">
				            </div>
							
						</div>
						<div class="col-md-6">
				            <div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <label for="city">City</label><br>
				              <input type="text" id="city" class="form-control form-control-sm" name="city" value="<?php echo $cus_city;?>">
				            </div>
				            
				            <div class="md-form form-sm"> <i class="fa fa-phone prefix"></i>
				              <label for="phone">Phone</label><br>
				              <input type="text" id="phone" class="form-control form-control-sm" name="phone" value="<?php echo $cus_phone;?>">
				            </div>
				            
						</div>
						<div class="text-center mt-4">
			              	<button class="btn btn-default" type="submit" name="update"> <i class ="fas fa-edit"> Update </i><i class="fa fa-paper-plane-o ml-1"></i></button>
			            </div>					
						<div class="text-center mt-4">
							  <a class="btn btn-default" href="./change_password.php"> <i class="fas fa-exchange-alt"> Change Password</i></a>
						</div>					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['update'])){
		$customer_id = $cus_id;
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$address1 = $_POST['address1'];
		$city = $_POST['city'];
		$phone = $_POST['phone'];

		$updateCus = "UPDATE customers SET fullname = '$fullname', email = '$email', address1 = '$address1', city = '$city', phone = '$phone' WHERE id = '$customer_id'";
		$run_query = $db->query($updateCus);
		if($run_query){
			echo "<script>alert('Your account has been successfully updated')</script>";
			echo "<script>window.open('myaccount.php','_self')</script>";
		}
	}
?>