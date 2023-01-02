<?php 
  
  require_once '../core/init.php';
  require_once('includes/header.php');
?>
<script src="../js/insertupdate.js"></script>


<?php 
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
  if(!isset($_SESSION['admin_logged_in'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
  <main>
    <h2 class="text-center p-3">Students(s) Working On Different Companies</h2>
      <div class="container-fluid table-responsive"> 
      <div class="float-right mx-3">
      </div> 
        <table class="table table-striped table-bordered" style="display: table;">
          <thead>
            <th class="text-center"><h5 class="h5-responsive"><b>SN</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Name of Students</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>IOE Email</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Name of Company</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Location</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Category</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Duration</b></h5></th>
          </thead>
          <tbody>
            <?php 
              $sql = "SELECT * FROM student_location";
              $studentsList = $db->query($sql);
              $key = 0;
            ?>

            <?php while($student = mysqli_fetch_assoc($studentsList)):
                $key++;
              ?>
                <tr>
                  <td class="text-center"><?=$key;?></td>
                  
                  <td class="text-center"><?=$student['name'];?></td>
                  <td class="text-center"><?=$student['email'];?></td>
                  <td class="text-center"><?=$student['company'];?></td>
                  <td class="text-center"><?=$student['address'];?></td>
                  <td class="text-center"><?=$student['category'];?></td>
                  <td class="text-center"><?=$student['duration'];?></td>
                
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>
      </div>
    <?php } ?>
  </main>

<?php require_once 'includes/footer.php'; ?>