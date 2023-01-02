<?php
    require_once '../core/init.php';
    require_once('includes/header.php');

    if(!isset($_SESSION['admin_logged_in'])){
		echo "<script>window.open('login.php','_self')</script>";
    }

    else{
      $sql = "SELECT * FROM admin WHERE verify='1'";
      $admins = $db->query($sql);
      $admin = $admins->fetch_all(MYSQLI_ASSOC);
      $key=0;
    }

?>

    <main>
		<h2 class="text-center p-3"> Admins List</h2>
		<div class="container-fluid table-responsive"> 
			<table class="table table-striped table-bordered" style="display: table;">
	          	<thead>
	          		
					  <th class="text-center"><h5 class="h5-responsive"><b>S.N.</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Name of Admin</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Email</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Date Joined</b></h5></th>
					</thead>
					<tbody>
						
    
<?php foreach($admin as $admin):?>
	<tr>
		<?php 
				$email = $admin['email'];
				$sql1 = "SELECT * FROM admin WHERE email = '$email'";
				$execute = $db->query($sql1);
				echo $db->error;
				
			?>
		<td class="text-center"><?=++$key?></td>
		<td class="text-center"><?=$admin['fullname'];?></td>
		<td class="text-center"><?=$admin['email'];?></td>
		<td class="text-center"><?=$admin['created_at'];?></td>
	</tr>
<?php endforeach;?>
</tbody>
</table>
</div>


<?php
  $sql = "SELECT * FROM admin WHERE verify='0'";
  $admins = $db->query($sql);
  $admin = $admins->fetch_all(MYSQLI_ASSOC);
  $key=0;
?>

						
    
<?php foreach($admin as $admin):?>
	<h2 class="text-center p-3"> Admin Request</h2>
		<div class="container-fluid table-responsive"> 
			<table class="table table-striped table-bordered" style="display: table;">
	          	<thead>
	          		
					  <th class="text-center"><h5 class="h5-responsive"><b>S.N.</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Name of Admin</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Email</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Date Requested</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Action</b></h5></th>
					</thead>
					<tbody>
	<tr>
		<?php 
				$email = $admin['email'];
				$sql1 = "SELECT * FROM admin WHERE email = '$email'";
				$execute = $db->query($sql1);
				echo $db->error;
				
			?>
		<td class="text-center"><?=++$key?></td>
		<td class="text-center"><?=$admin['fullname'];?></td>
		<td class="text-center"><?=$admin['email'];?></td>
		<td class="text-center"><?=$admin['created_at'];?></td>
		<td class="text-center">
			<a href="./approveadmin.php?id=<?php echo $admin['id']?>" class="btn btn-sm btn-primary" name="approve">Approve</a>
			<a href="./rejectadmin.php?id=<?php echo $admin['id']?>" class="btn btn-sm btn-danger" name="delete">Reject</a>
		</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>




</main>
