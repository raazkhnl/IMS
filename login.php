<?php 
	require_once 'core/init.php';
	if(isset($_SESSION['logged_in'])){
		echo "Bad Request";
		die();
	}
	require_once 'includes/header.php';
?>
<h3 class="text-center" style="margin-top: 100px;"><b>Login Panel </b></h3>

<div class=" container p-3 d-flex justify-content-center" style="margin-top: 10px;">
	<div class="card col-lg-7">
		<div class="card-header mt-4">
			<h3 class="p-2  h3-responsive">Login here!</h3>
		</div>
		<form action="" method="post">
			<div class="card-body">
				<div class="md-form form-sm">
					<input type="text" id="email" class="form-control form-control-sm" name="email" required>
					<label for="email">Email</label>
				</div>
				<div class="md-form form-sm">
					<input type="password" id="password" class="form-control form-control-sm" name="password" required>
					<label for="password">Password</label>
				</div>
				
			</div>			
			<div class="card-footer">
				<div class="float-left">
					<button type="submit" name="login" class="btn btn-primary" style="border-radius: 10em; background: purple">Login</button>
				</div>
				<div class="mt-5 float-right">
				<h6 class="text-dark">Do not have an account? <a href="register.php">Register</a> or <a href="admin/login.php">Login as Admin</a>  </h6>
				</div>
			</div>
		</form>
	</div>
</div>



		<?php 
			if(isset($_POST['login'])){
				$email = $_POST['email'];
				$password = $_POST['password'];

				$sql = "SELECT * FROM customers WHERE password = '$password' AND email = '$email'";
				$runSql = $db->query($sql);
				$check_customer = mysqli_num_rows($runSql);
				if($check_customer == 0){
					echo "<h5 class = 'text-danger text-center'>*Invalid login details</h5>";
                    require_once 'includes/footer.php';
                    exit();
				}
				// $ip = getIp();				
				if($check_customer > 0){
					$_SESSION['email'] = $email;
					$_SESSION['logged_in'] = TRUE;
						echo "<script>alert('You logged in successfully!')</script>";
						echo "<script>window.open('index.php','_self')</script>";
				}else{
					$_SESSION['email'] = $email;
					echo "<script>alert('You logged in successfully!')</script>";
					echo "<script>window.open('cart.php','_self')</script>";
				}
			}
		?>
	</div>
</div>

<?php
	include 'includes/footer.php';
?>