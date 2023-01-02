<?php
require_once '../core/init.php';
require_once './includes/header.php';
if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
}
?>
<div class=" col-md-10 container my-4 card">
<h3 class="text-center mt-5 card-header">Add a employer</h3>
<form action="addEmployer.php" method="POST" onsubmit="confirmBox('added new employer')">
        <div class="form-group card-body">
            <label>Name of Employer :</label><br>
            <input type="text" class="form-control" name="nameOfCompany">
        </div>

        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Location :</label>
            <input type="text" class="form-control" name="location">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">About Employer :</label>
            <textarea class="form-control" name="aboutCompany" rows="6" style="resize:none;" ></textarea>
        </div>
        <div class="form-group card-body">
            <button type = "submit"  class="btn btn-primary font-weight-bold insert" name = "addButton">Add</button>
        </div>
</form>
</div>
<?php
if(isset($_POST['addButton'])){
        $nameOfCompany = sanitize($_POST['nameOfCompany']);
        $location = sanitize($_POST['location']);
        $aboutCompany = sanitize($_POST['aboutCompany']);

        $insertCompany = "INSERT INTO employer_account (`employer_name`,`location`,`about_company`) VALUES ('$nameOfCompany','$location','$aboutCompany')";
        $query = $db->query($insertCompany);
        
        if($query){
            $_SESSION['added'] = 'New Employer Successfully added !!!';
        }
        else{
            $_SESSION['failed'] = '*Fail to add' . $db->error;
        }
        echo"
            <script>
                window.location.href = 'addInternship.php';
                </script>";
    }
 ?>