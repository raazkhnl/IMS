<?php
require_once './includes/header.php';
require_once "../core/init.php";
?>




<script src="../js/insertupdate.js"></script>


<?php
if (!isset($_SESSION['admin_logged_in'])) {
  echo "<script>window.open('login.php','_self')</script>";
}
if (isset($_SESSION['updated'])) {
  
  echo "<script>confirmBox('updated this')</script>";
  unset($_SESSION['updated']);
}
if (isset($_SESSION['added'])) {
?> <script>
    confirmBox('inserted new')
  </script>
<?php
  unset($_SESSION['added']);
} elseif (isset($_SESSION['failed'])) {
  echo "<p class = 'alert-danger text-center'>$_SESSION[failed]</p>";
  unset($_SESSION['failed']);
}
if (isset($_SESSION['deleted'])) {
  echo "<p class = 'text-center alert-danger'> $_SESSION[deleted]</p>";
  unset($_SESSION['deleted']);
}
?>
<?php
$sql = "SELECT * FROM internships INNER JOIN employer_account ON internships.employer_id=employer_account.employer_id";
$internships = $db->query($sql);
$currentdate = date("Y-m-d h:i:s");
?><div class="float-right mx-3">
<a href="addInternship.php" style="background-color:purple" class="btn  btn-sm"><i style="color:white" class="fa fa-plus">Add New</i></a>
</div>

<div class="container-fluid row">
<?php while ($internship = mysqli_fetch_assoc($internships)) : ?>
    <?php if($internship['interview_date']> $currentdate){?>
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-header row ml-2" style="height: 140px; width: 450px;">
                    <h4 class="p-2 h4-responsive text-center my-auto"><b><?= $internship['category']; ?></b></h4>
                    
                    </div>
                    <div class="card-body" style="height: 200px;">
                    <h6 class="  card-title float-left">Name: <?= $internship['employer_name']; ?></h6>
                    <h6 class=" h6-responsive float-right">Location: <?= $internship['location']; ?></h6>
                    <table class="table table-bordered">
                        <thead>
                            <th>Posted On</th>
                            <th>Deadline</th>
                            <th>Interview Date</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $internship['postedOn']; ?></td>
                                <td><?= $internship['applyBy']; ?></td>
                                <td><?= $internship['interview_date']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer  row ml-2 " style = "width:450px;">
                    
                        <a href="details.php?internship=<?= $internship['id']; ?>" class="btn btn-info btn-sm  waves-effect z-depth-0" style="width: auto"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                    

                        <a href="update.php?id=<?php echo $internship['id'] ?>" class="btn btn-primary btn-sm  waves-effect z-depth-0" style="width: auto"><i class="fas fa-edit" aria-hidden="true"></i> Update</a>
                   
                
                    
                        <a href="delete.php?id=<?= $internship['id'];  ?>" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger btn-sm  waves-effect z-depth-0"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                    
                </div>

            </div>
        </div>
        <div>
            
        </div>
    <?php } ?>
        <?php endwhile; ?>
    </div>