<?php 
  
  require_once '../core/init.php';
  if(isset($_SESSION['admin_logged_in'])){
	echo "Bad Request!!!";
	die;
  }
  require_once('includes/header.php');
?>

<h2 class="text-center " style="margin-top: 60px;">Admin Registration</h2>
<div class="container-fluid p-2 col-xl-7">
	<div class="card">
		<div class="card-header">
			<h3 class=" p-2 text-center">Registration Form</h3>
		</div>
		<div class="card-body ">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="register.php">
					<div class="row">					
						<div class="col-md-12">
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="fullname" class="form-control form-control-sm" name="fullname">
				              <label for="fullname">Full Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="email" id="email" class="form-control form-control-sm" name="email">
				              <label for="email">Email</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-lock prefix"></i>
				              <input type="password" id="password" class="form-control form-control-sm" name="password">
				              <label for="password">Password</label>
				            </div>
				            
				            
						</div>
						
						
						
										
					</div>
					<div class="mt-4 float-left">
			              	<button class="btn btn-default" type="submit" name="submit">Sign Up <i class="fa fa-paper-plane-o ml-1"></i></button>
			            </div>	
					<div class="mt-5 float-right">
							<h6 class="text-dark">Already has an account? <a href="login.php">Login</a></h6>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php
	if(isset($_POST['submit'])){
		$ip = getIp();
		$fullname = sanitize($_POST['fullname']);
		$email = sanitize($_POST['email']);
		$password = sanitize($_POST['password']);
		

		if(!empty($fullname) && !empty($password) && !empty($email)){
            $fetch = "select email from admin where `email` = '$email'";
            $result = $db->query($fetch);
            if($result->num_rows >=1){
			echo "<h6 class = 'text-center text-danger font-weight-normal'>*User Email already exists*</h6>";
			require_once 'includes/footer.php';
			die();
            
            }
        
            if(strlen($password)<8){
			echo "<h6 class = 'text-center text-danger font-weight-normal'>*Password must be greater than 8 characters*</h6>";
			require_once 'includes/footer.php';
			die();

            }
                                
                
				$insertUser = "INSERT INTO admin (`fullname`,`email`,`password`,`verify`) VALUES ('$fullname','$email','$password','0')";
				$db->query($insertUser);
            
            
           
                            }


		
		if(isset($result)){
			echo "<p class = 'text-center alert-success'>Account has been successfully created</p>";
			echo "<script>window.open('login.php','_self')</script>";
		}else{
			echo "<h6 class = 'text-center text-danger font-weight-normal'>**Error in creating account</h6>";
		}
	}
?>

<?php require_once 'includes/footer.php';?>