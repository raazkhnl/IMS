<?php 
	require_once '../core/init.php';
	if(isset($_SESSION['admin_logged_in'])){
		echo "Bad Request!!!";
		die;
	  }
	require_once 'includes/header.php';
?>
<h3 class="text-center" style="margin-top: 100px;"><b> Admin Login Panel </b></h3>

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
				<h6 class="text-dark">Do not have an account? <a href="register.php">Register</a> or <a href="../login.php">Login as User</a>  </h6>				</div>
			</div>
		</form>
		</div>
</div>
		<?php 
			if(isset($_POST['login'])){
				$email = $_POST['email'];
				$password = $_POST['password'];
				$sql = "SELECT verify FROM admin WHERE password = '$password' AND email = '$email'";
				$result = $db->query($sql);
				if($result->num_rows == 0){
					echo "<h5 class = 'text-danger text-center'>*Invalid Login details</h5>";
					require_once 'includes/footer.php';
					exit();
				}
				else{
					$row = $result->fetch_assoc();
					if($row['verify']==0){
						echo "<h5 class = 'text-danger text-center'>*Your account nedd to be verified Contact admin</h5>";
					require_once 'includes/footer.php';
					exit();
					}
					$_SESSION['email']=$email;//set up session variable email 
					$_SESSION['admin_logged_in'] = TRUE;
					echo "<script>window.open('index.php','_self')</script>";
					echo "<script>alert('You logged in successfully!')</script>";
					$_SESSION['count'] = 0;
				}
				
			}
		?>
	

<?php
	require_once 'includes/footer.php';
?>

