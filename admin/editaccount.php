<?php 
	require_once('../core/init.php');
	require_once './includes/header.php';
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
				              <input type="text" id="fullname" class="form-control form-control-sm" name="fullname" value="<?php echo $admin_name;?>">
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <label for="email">Email</label><br>
				              <input type="email" id="email" class="form-control form-control-sm" name="email" value="<?php echo $admin_email;?>">
				            </div>
						</div>
                    </div>
                    <div class="row">
						<div class="text-center mt-4">
			              	<button class="btn btn-default" type="submit" name="update"> <i class ="fas fa-edit"> Update </i><i class="fa fa-paper-plane-o ml-1"></i></button>
			            </div>					
						<div class="text-center mt-4">
							  <a class="btn btn-default" href="./changepassword.php"> <i class="fas fa-exchange-alt"> Change Password</i></a>
						</div>
                    </div>					
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['update'])){
		$admin_id = $admin_id;
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
        $email = $_SESSION['email'];
		$updateCus = "UPDATE admin SET fullname = '$fullname', email = '$email' WHERE id = '$admin_id'";
		$run_query = $db->query($updateCus);
		if($run_query){
			echo "<script>alert('Your account has been successfully updated')</script>";
			echo "<script>window.open('adminaccount.php','_self')</script>";
		}
	}
?>