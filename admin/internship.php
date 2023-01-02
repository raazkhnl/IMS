<?php

require_once '../core/init.php';
require_once('includes/header.php');

$currentdate = date('Y-m-d');
?>
<script src="../js/insertupdate.js"></script>


<?php
if (!isset($_SESSION['admin_logged_in'])) {
  echo "<script>window.open('login.php','_self')</script>";
}
if (isset($_SESSION['updated'])) {
  echo "HEllo";
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

<body>
  <a href="./delete.php?deleteAll=1" class="btn btn-sm btn-danger float-right z-depth-0-20" name = 'deleteall' onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-history" aria-hidden="true"></i><b> Clear History</b></a>
  
  
    <h5 class="text-center p-3 text-danger">*<b> History Of Internships </b>*</h5>
    <div class="container-fluid table-responsive">
      
      <table class="table table-striped table-bordered" style="display: table;">
        <thead>
          <th class="text-center">
            <h5 class="h5-responsive"><b>SN</b></h5>
          </th>
          <th class="text-center">
            <h5 class="h5-responsive"><b>View <br>Details</b></h5>
          </th>
          <th class="text-center">
            <h5 class="h5-responsive"><b>Name of Company</b></h5>
          </th>
          <th class="text-center">
            <h5 class="h5-responsive"><b>Location</b></h5>
          </th>
          <th class="text-center">
            <h5 class="h5-responsive"><b>Duration</b></h5>
          </th>
          <th class="text-center">
            <h5 class="h5-responsive"><b>Stipend</b></h5>
          </th>
          <th class="text-center">
            <h5 class="h5-responsive"><b>Available Positions</b></h5>
          </th>
          <th class="text-center">
            <h5 class="h5-responsive"><b>Posted On</b></h5>
          </th>
          <th class="text-center">
            <h5 class="h5-responsive"><b>Apply By</b></h5>
          </th>
         
          <th class="text-center">
            <h5 class="h5-responsive"><b>Delete</b></h5>
          </th>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM internships i INNER JOIN employer_account e ON i.employer_id=e.employer_id AND  interview_date < '$currentdate' AND deleted = 0";
          $internships = $db->query($sql);
          $key = 0;
          ?>

          <?php while ($internship = mysqli_fetch_assoc($internships)) :
            $key++;
          ?>
            <tr>
              <td class="text-center"><?= $key; ?></td>
              <td>
                <a href="details.php?internship=<?= $internship['id']; ?>&history=1"><i class="fas fa-eye fa-lg" style="postion: relative; padding-left: 10px;"></i></a>
              </td>
              <td class="text-center"><?= $internship['employer_name']; ?></td>
              <td class="text-center"><?= $internship['location']; ?></td>
              <td class="text-center"><?= $internship['duration']; ?></td>
              <td class="text-center"><?= $internship['stipend']; ?></td>
              <td class="text-center"><?= $internship['positions']; ?></td>
              <td class="text-center text-danger" style="font-weight: 500;""><?= $internship['postedOn']; ?></td>
              <td class="text-center text-danger" style="font-weight: 500;"><?= $internship['applyBy']; ?></td>
              <td class="text-center "><a class=" delete btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')" href="delete.php?id=<?php echo $internship['id'] ?>"><i class="fas fa-trash"></i> Delete</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  
  
   
  
</body>