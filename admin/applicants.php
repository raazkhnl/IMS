<?php 
require_once '../core/init.php';
require_once './includes/header.php';
$name = $_GET['name'];
$category = $_GET['category'];
// echo 'm'.$category;
// if(isset($_GET['']))
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
// echo $_GET['name'];
$sql = "SELECT * from applications a Inner Join customers c on a.cus_id = c.id INNER JOIN internships i ON a.int_id = i.id INNER JOIN employer_account e ON i.employer_id=e.employer_id AND a.applied = 1 AND i.category = '$category' AND e.employer_name = '$name'";
$result = $db->query($sql);
$currentdate = date('Y-m-d');
// print($sql);
// echo $db->error;
if ($result != FALSE) {
    $application = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No history";
    exit;
}

// echo "<pre>";
// print_r($application);
// echo "</pre>";
?>
<h2 class="text-center p-3"> Application(s) by Students </h2>
		<div class="container-fluid table-responsive">  
            <h2 class="bold"><?php echo $_GET['name'] . "Internship For ". $_GET['category']?></h2>
	        <table class="table table-striped table-bordered" style="display: table;">
	          	<thead>
	          		
		            <th class="text-center"><h5 class="h5-responsive"><b>S.N.</b></h5></th>
		            <th class="text-center"><h5 class="h5-responsive"><b>Name of Applicant</b></h5></th>
		            <th class="text-center"><h5 class="h5-responsive"><b>Email</b></h5></th>
		            <th class="text-center"><h5 class="h5-responsive"><b>Phone</b></h5></th>
                    <?php 
                    if(isset($_GET['history']) == 0){
		           echo '<th class="text-center"><h5 class="h5-responsive"><b>Status</b></h5></th>' ;
                   }?>
	          	</thead>
	          	<tbody>
                      <?php
                      $key = 0;
foreach($application as $application){ ?>
    <tr>
	              	
    <td class="text-center"><?=++$key?></td>
    <td class="text-center"><?=$application['fullname'];?></td>
    <td class="text-center"><?=$application['email'];?></td>
    <td class="text-center"><?=$application['phone'];?></td>
    <?php if(isset($_GET['history']) == 0){ ?>

    <td class="text-center">
        <a href="./updateStatus.php?id=<?php echo $application['id']?>" class="btn btn-sm btn-primary" name="approve">
            <?=$application['status'] . "...";?>
</a>
        <a  onclick = "return confirm('Are you sure want to delete?')"href="./deleteApplication.php?id=<?php echo $application['cus_id']?>&id2=<?php echo $application['int_id']?>" class=" btn btn-sm btn-danger" name = "delete">
            Delete
</a>
    </td>
<?php } ?>
  </tr>
<?php } ?>
</tbody>
	        </table>
</div>