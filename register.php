<?php
// session_start();
require_once('core/init.php');
if(isset($_SESSION['logged_in'])){
	echo "Bad Request";
	die();
}
require_once('includes/header.php');

?>
<style>
	.label{
		padding: 0;
		color:black;
		font-size: large;
	}
</style>
<script>
	function confirmBox() {
		swal({
			title: 'Sucess!!!',
			text: 'You have successfully created new account',
			icon: 'success',
		})

	}
</script>
<div class="container-fluid p-2">
	<div class="card col-md-8 mx-auto" style="height: 580px;">
		<div class="card-header" style="padding: 0;width:100%">
			<h2 class="h2-responsive  text-primary" style="font-weight: bold;padding-left:35px; height:50px;margin-top:20px;">Registration Form</h2>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class=" grey-text" method="post" action="created.php">
					<div class="row">
						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
								<label for="fullname" style="padding: 0; color:black;font-size:16px"class="label"  >Full Name*</label><br>
								<input type="text" id="fullname" class="form-control form-control-sm" name="fullname">
							</div>
						</div>
						<div class="col-md-6">

							<div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
								<label for="email" style="color: black;font-size:16px"class="label">Email*</label><br>
								<input type="email" id="email" class="form-control form-control-sm" name="email">
								<small class="text-muted" style="margin-left: 30px;" >You need to signup with pcampus email</small>
							</div>
						</div>
						<div class="col-md-6">

							<div class="md-form form-sm"> <i class="fa fa-lock prefix"></i>
								<label for="password"class="label" style="color:black;font-size:16px">Password*</label><br>
								<input type="password" id="password" class="form-control form-control-sm" name="password">
							</div>
						</div>
						<div class="col-md-6">

							<div class="md-form form-sm"> <i class="fas fa-map prefix"></i>
								<label for="address1"class="label" style="color:black;font-size:16px">Address*</label><br>
								<input type="text" id="address1" class="form-control form-control-sm" name="address1">
							</div>
						</div>


						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-map-marker-alt prefix"></i>
								<label for="city"class="label" style="color: black;font-size:16px">City*</label> <br>
								<input type="text" id="city" class="form-control form-control-sm" name="city">
							</div>
						</div>

						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-phone prefix"></i>
								<label for="phone"class="label" style="color: black;font-size:16px">Phone*</label><br>
								<input type="text" id="phone" class="form-control form-control-sm" name="phone">
							</div>
						</div>

					</div>
					<?php if (isset($_SESSION['error'])) {
						echo "<p class = 'text-danger text-center'>$_SESSION[error]</p>";
						unset($_SESSION['error']);
					}
					if (isset($_SESSION['created'])) {
						echo "<script>
									 confirmBox();
									   </script>";
						unset($_SESSION['created']);
						echo "<script>window.open('login.php','_self')</script>";
					}

					?>
					<div class=" mt-4">
						<button class="btn btn-primary" style="border-radius: 10em; font-size:1.2rem;" type="submit" name="submit"> Submit <i class="fa fa-paper-plane-o ml-1"></i></button>


					</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>



<?php require_once('includes/footer.php'); ?>