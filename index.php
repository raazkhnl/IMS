<?php 
  // session_start();
  require_once 'core/init.php';  
  require_once 'includes/header.php'; 
?>
<?php 
  $currentdate =date('Y-m-d');
  $sql = "SELECT * FROM internships i INNER JOIN employer_account a ON i.employer_id=a.employer_id AND applyBy > '$currentdate'";
  $internships = $db->query($sql);
  $internships = $internships->fetch_all(MYSQLI_ASSOC);
  $index = sizeof($internships);
  // echo $index;
  $keys= 0;
?>
<body onload="">
  <h2 class="text-center pt-3 text-primary" id = "key" style="margin:30px; font-size:45px; margin-top:40px; font-weight:bolder;"></h2>
  <div style="margin-left:20px ;">
  <div class="container-fluid row">
    <!-- List of Internships -->
    <?php foreach($internships as $internship): 
    $keys++
      ?>

    <div class="col-md-6 <?php if($index==$keys){echo 'mx-auto col-md-6';}?>" style="margin-bottom: 20px;;">
      <div class="card mt-4">
        <div class="card-header" style="height: 100px;">
          <h3 class="p-2 text-center card-title text-primary pt-3" style="font-size: 30px;"><?=$internship['category'];?></h3>
        </div>
        <div class="card-body">
          <h4 class="p-2 h4-responsive float-left m-0"><b><?=$internship['employer_name'];?></b></h4>
          <h5 class="p-2 h5-responsive float-right">Location: <b><?=$internship['location'];?></b></h5>
          <table class="table table-bordered">
            <thead>
              <th>Duration</th>
              <th>Stipend</th>
              <th>Posted On</th>
              <th>Apply By</th>
              <th>Available Positions</th>
            </thead>
            <tbody>
              <tr>
                <td><?=$internship['duration'];?> months</td>
                <td>&#8377; <?=$internship['stipend'];?></td>
                <td><?=$internship['postedOn'];?></td>
                <td><?=$internship['applyBy'];?></td>
                <td><?=$internship['positions'];?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer text-center">
          <a href="internship.php?internship=<?=$internship['id'];?>" class="btn btn-md btn-primary waves-effect z-depth-0 text-center" style="font-size: 14px;">View Details</a>
        </div>
      </div>
    </div>
    <?php  endforeach?>
  </div>
  <br>
  </div>

  <?php if($index ==0){
    echo "<h4 class = 'text-center'>No Internships available right now</h4>";
  }
  ?>
  <script>
    var key = document.getElementById('key');
    key.innerHTML = "Available Internships (<?php echo $index?>)"
    
  </script>
      </body>
<?php require_once 'includes/footer.php'; ?>