<!DOCTYPE html>

<?php 
  
  require_once 'core/init.php';
  require_once 'includes/header.php';
  $sql = "SELECT * FROM internships WHERE deleted=0";
  $internships = $db->query($sql);
?>

<html lang="en">

<?php 
  // Fetch the internship details
  if(isset($_GET['internship'])){
    $id = sanitize((int)$_GET['internship']);
    $sql = "SELECT * FROM internships i INNER JOIN employer_account a ON i.employer_id=a.employer_id and id = '$id'";
    $sqlResult = $db->query($sql);
    $internshipCount = mysqli_num_rows($sqlResult);
    if($internshipCount > 0){
      while ($row = mysqli_fetch_array($sqlResult)) {
        $category = $row['category'];
        $nameOfCompany = $row['employer_name'];
        $postedOn = $row['postedOn'];
        $applyBy = $row['applyBy'];
        $aboutCompany = $row['about_company'];
        $aboutInternship = $row['aboutInternship'];
        $location = $row['location'];
        $perks = $row['perks'];
        $duration = $row['duration'];
        $stipend = $row['stipend'];
        $positions = $row['positions'];
        $whoCanApply = $row['whoCanApply'];
        $interviewdate = $row['interview_date'];
        $url = $row['url'];
      }
    }else{
      echo "Internship does not exist";
      exit();
    }
  }
  else{
    echo "Data is missing, please select the internship";
    exit();
  }
?>
  <!-- Display internship details -->
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h2 class="p-2 text-center text-primary card-title" style="font-size: 40px; margin-top:10px;"><?=$category;?> at <?=$nameOfCompany;?></h2>
      </div>
      <div class="card-body">
        <h4 class="p-2 h4-responsive float-left"><?=$category;?></h4>
        <h5 class="p-2 h5-responsive float-right">Location: <b><?=$location;?></b></h5>
        <table class="table table-bordered">
          <thead>
            <th>Duration</th>
            <th>Stipend</th>
            <th>Posted On</th>
            <th>Apply By</th>
            <th>Available Positions</th>
            <th>Interview Date</th>
          </thead>
          <tbody>
            <tr>
              <td><?=$duration;?> months</td>
              <td>&#8377; <?=$stipend;?></td>
              <td><?=$postedOn;?></td>
              <td><?=$applyBy;?></td>
              <td><?=$positions;?></td>
              <td><?=$interviewdate;?></td>
            </tr>
          </tbody>
        </table>
        <div class="text-justify py-2">
          <div class="aboutCompany">
            <h4 class="h4-responsive">About Company</h4>
            <p class="py-2"><?=$aboutCompany;?></p>
          </div>
          <div class="aboutInternship">
            <h4 class="h4-responsive">About Internship</h4>
            <p class="py-2"><?=nl2br($aboutInternship);?></p>
          </div>
          <div class="positions">
            <h4 class="h4-responsive">No. of positions available</h4>
            <p class="py-2"><?=$positions;?></p>
          </div>
          <div class="whoCanApply">
            <h4 class="h4-responsive">Who can apply</h4>
            <p class="py-2"><?=nl2br($whoCanApply);?></p>
          </div>
          <div class="perks">
            <h4 class="h4-responsive">Perks of the internship</h4>
            <p class="py-2"><?=$perks;?></p>
          </div>
          <div class="url">
            <h4 class="h4-responsive">Important Link</h4>
            <a class="py-2" href="<?=$url;?>" target="_blank"><?=$url;?></a>
          </div>
        </div>
      </div>

      <div class="card-footer">
        <?php
          if(!isset($_SESSION['email'])){
            echo "<a href='login.php' class='btn btn-primary btn-sm waves-effect z-depth-0' name='apply'>Apply Now</a>";
          }else{
            
            $email = $_SESSION['email'];
            $sqlcus = "SELECT * FROM customers WHERE email = '$email'";
            $result = $db->query($sqlcus);
            while ($row_pro = mysqli_fetch_array($result)) {
              $cus_id = $row_pro['id'];
              $cus_name = $row_pro['fullname'];
              $cus_email = $row_pro['email'];
              $cus_address1 = $row_pro['address1'];
              $cus_city = $row_pro['city'];
              $cus_phone = $row_pro['phone'];
              $cus_deleted = $row_pro['deleted'];
            }

            $sqlapp = "SELECT * FROM applications WHERE cus_id = '$cus_id' AND int_id = '$id'";
            $applications = $db->query($sqlapp);
            while($application = mysqli_fetch_array($applications)){
              $app_id = $application['id'];
              $cus_app_id = $application['cus_id'];
              $int_id = $application['int_id'];
              $applied = $application['applied'];
              $status = $application['status'];
              
            }

            if(isset($cus_app_id) == $cus_id){  
              

              if($status == 'approved'){
                echo "<a href='#' class='btn btn-success btn-sm waves-effect z-depth-0' name='applied'>";
                

                    echo "Approved </a>";
                  }
                  else{
                    echo " <a href='#' class='btn text-white btn-sm waves-effect z-depth-0'";?>  style = 'background-color:#f0ad4e;'<?php echo" name='applied'>Your application is pending...</a>";
                  }
                
              
              }          
              // elseif($cus_deleted == 1){ 
              //   echo "<a href='#' class='btn btn-success btn-black waves-effect z-depth-0' name='applied'>Your application has been rejected by admin</a>";
              // }
            
            else{
        ?>
        <script>
	function confirmBox() {
		swal({
			title: 'Sucess!!!',
			text: 'You have successfully applied for this internship',
			icon: 'success',
		}).then((sucess)=>{
			if(sucess){
				window.location.href = "./application.php?apply=<?=$id;?>";
			}
		})

	}
</script>
        <a href="javascript:void(0)" onclick="confirmBox()" class="btn btn-primary btn-sm waves-effect z-depth-0" name="apply">Apply Now</a>
        <?php } } ?>
      </div>
    </div>
  </div>

<?php require_once 'includes/footer.php';?>