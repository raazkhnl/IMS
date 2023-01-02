<?php
	require_once '../core/init.php';
	require_once('includes/header.php');
?>

<?php 
	if(!isset($_SESSION['admin_logged_in'])){
		echo "<script>window.open('login.php','_self')</script>";
    }else{
		// $_SESSION['count'] =0;
		// $count = 0;
		$currentdate = date('Y-m-d');
		
		?>
		<?php 
		$sql = "SELECT * FROM applications a INNER JOIN customers c ON a.cus_id = c.id INNER JOIN internships i ON a.int_id = i.id INNER JOIN employer_account e ON e.employer_id=i.employer_id AND a.applied = 1";
		$applications = $db->query($sql);
		$application = $applications->fetch_all(MYSQLI_ASSOC);
		//   $ids = $application[0]['id'];
		
		
		$key =0;
		?>
<script>

	// myfunc();
</script>
<style>

	.loading{
		width: 100%;
		height: 100vh;
		position:fixed;
		top: 0;
		bottom: 0;
		background: url('../assets/loading.gif') center;
		background-repeat: no-repeat;
		background-color: #FFF;
		z-index: 1;
	}
	.load{
		position: absolute;
		top: 280px;
		right: 635px;
	}
</style>
<body onload="animation()">
	
	<div class="loading" id = "loading">
		<div class="load" id="load"><b>Logging in...</b></div>
	</div>
	
	<main>
		<h2 class="text-center p-3"> Application(s) by Students </h2>
		<div class="container-fluid table-responsive"> 
		<a style="background-color: purple" href="./updateStatus.php?all=1" class="float-right btn btn-sm " name="approve">
		<i style="color: white" class="fas fa-check-double" > Approve all</i>
				</a> 
			<table class="table table-striped table-bordered" style="display: table;">
	          	<thead>
	          		
					  <th class="text-center"><h5 class="h5-responsive"><b>S.N.</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Name of Applicant</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Category</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Name of Company</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Email</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Phone</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Status</b></h5></th>
					  <th class="text-center"><h5 class="h5-responsive"><b>Work Status</b></h5></th>
					</thead>
					<tbody>
						

<?php foreach($application as $application):?>
	<tr>
		<?php 
			if($application['interview_date'] > $currentdate){
				$email = $application['email'];
				$sql1 = "select int_id ,workstatus from applications a inner join customers c on a.cus_id = c.id AND a.workstatus = 'interning' and c.email = '$email'";
				$execute = $db->query($sql1);
				echo $db->error;
				
			?>
		<td class="text-center"><?=++$key?></td>
		<td class="text-center"><?=$application['fullname'];?>
		<?php if($application['workstatus']=='interning'){//mysqli_num_rows($execute)>0
			echo "<br><span class = 'text-warning'>*Already interning<span>";
		}?></td>
		<td class="text-center"><?=$application['category'];?></td>
		<td class="text-center"><?=$application['employer_name'];?></td>
		<td class="text-center"><?=$application['email'];?></td>
		<td class="text-center"><?=$application['phone'];?></td>
		<td class="text-center">
			<a href="./updateStatus.php?id=<?php echo $application['id']?>" class="btn btn-sm btn-primary" name="approve">
			<?=$application['status'] . "...";?>
		</a>
		<a  onclick = "return confirm('Are you sure want to delete?')"href="./deleteApplication.php?id=<?php echo $application['cus_id']?>&id2=<?php echo $application['int_id']?>" class=" btn btn-sm btn-danger" name = "delete">
		<i class="fas fa-trash"></i>	Delete
	</a>
</td>
<td class="text-center">
	<form action="next.php" method="post">	
		<input type="hidden" name = "int_id" value="<?php echo $application['int_id']?>">
		<input type="hidden" name = "cus_id" value="<?php echo $application['cus_id']?>">
	<select class="form-select" aria-label="Default select example" name="workstatus" id="value">
	<option value="not interning" <?php if($application['workstatus']=='not interning'){
		echo "selected";
		}?>>not interning</option>
	<option value="interning" <?php if($application['workstatus']=='interning'){
		echo "selected";
		}?>>interning</option>
</select>
<button type = "submit" id = "ids" class="btn-sm btn-primary text-white">
Save</button></form>
</td>
				<?php } ?>
			</tr>
			<?php endforeach;?>
		</tbody>
	<script>
		var values = document.getElementById('value').value;
		var don = document.getElementById('ids');
		don.setAttribute('href',"status.php/?id=<?php echo $application['cus_id']?>&type=<?php echo $application['category']?>&status="+values);
	document.getElementById('ids');
	</script>
	</table>
</div>

</main>
<?php }

			
			
			?><script>
				

				
				</script>
		
			<script>
				function animation(){
					
					setTimeout(function(){ 
						document.getElementById('loading').style.display = 'none';
					}, 2000);
				}
				<?php 
				if($_SESSION['count'] != 0){?>
				var doc = document.getElementById('loading');
				doc.classList.remove('loading');
				var docs = document.getElementById('load');
				docs.classList.remove('load')
				doc.innerHTML =''
			<?php }?>
				</script>
					<?php 
				
				$_SESSION['count'] = 1;?>
</body>
	
	<?php
	require_once 'includes/footer.php';
	?>