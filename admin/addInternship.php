

<?php
require_once '../core/init.php';
require_once './includes/header.php';
if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
}
?>
<div class="ml-5 pl-5">
 <a href="insert.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-left">Back</i></a>
</div>

<div class=" col-md-10 container my-4 card">
    <h3 class="text-center mt-5 card-header">Add a Internship</h3>
    <form action="addInternship.php" method="POST" onsubmit="confirmBox('inserted new')">
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Choose a employer:</label>
            <select name="employer" id="companyname" class="form-control">
                <?php
                    $sql="SELECT * FROM employer_account";
                    $options = $db->query($sql);
                    $option = $options->fetch_all(MYSQLI_ASSOC);
                    foreach ($option as $option):?>
                        <option name="<?=$option['employer_name'];?>"><?=$option['employer_name'];?></option>
                    <?php endforeach;?>
            </select><br>
            <label>Add a employer :</label>
            <a href="./addEmployer.php" class="btn btn-primary font-weight-bold insert" name = "linktoadd">Add</a>
        </div>

        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Category :</label>
            <input type="text" class="form-control" name="category">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Duration :</label>
            <input type="text" class="form-control" name="duration">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Stipend :</label>
            <input type="text" class="form-control" name="stipend">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Available Position :</label>
            <input type="text" class="form-control" name="availablePosition">
        </div>
        
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Perks :</label>
            <input type="text" name="perks" class="form-control">
        </div>
        
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">About Internship :</label>
            <textarea class="form-control" name="aboutInternship" rows="6" style="resize:none;"></textarea>
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">Who Can Apply :</label>
            <textarea class="form-control" name = "whoCanApply" rows="6" style="resize:none;"></textarea>
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">Interview Date :</label>
            <input type = "date" class="form-control" name = "interview_date" rows="6" style="resize:none;">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">Deadline :</label>
            <input type = "date" class="form-control" name = "applyBy" rows="6" style="resize:none;">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">Add website Link :</label>
            <input type = "url" class="form-control" name = "url" rows="6" style="resize:none;">
        </div>
        <div class="form-group card-body">
            <button type = "submit"  class="btn btn-primary font-weight-bold insert" name = "buttonSubmit">Add</button>
        </div>
    </form>
    
</div>
<?php
    if(isset($_POST['buttonSubmit'])){
        $companyname= sanitize($_POST['employer']);
        $category = sanitize($_POST['category']);
        $duration = (int)sanitize($_POST['duration']);
        $stipend = (int)sanitize($_POST['stipend']);
        $availablePosition = (int)sanitize($_POST['availablePosition']);
        $perks = sanitize($_POST['perks']);
        $aboutInternship = sanitize($_POST['aboutInternship']);
        $whoCanApply = sanitize($_POST['whoCanApply']);
        $interview_date = sanitize($_POST['interview_date']);
        $applyBy = sanitize($_POST['applyBy']);
        $url = sanitize($_POST['url']);
        echo $companyname;
        $sql = "SELECT * FROM employer_account WHERE employer_name= '$companyname'";
		$q = $db->query($sql);
		$company_id = $q->fetch_all(MYSQLI_ASSOC);
        $employer_id=$company_id[0]['employer_id'];

        $insertIntern = "INSERT INTO internships (`employer_id`,`category`,`aboutInternship`,`perks`,`duration`,`stipend`,`positions`,`whoCanApply`,`interview_date`,`applyBy`,`url`) VALUES ('$employer_id','$category','$aboutInternship','$perks','$duration','$stipend','$availablePosition','$whoCanApply','$interview_date','$applyBy','$url')";
        $query = $db->query($insertIntern);
        
        if($query){
            $_SESSION['added'] = 'New Internship Successfully added !!!';
        }
        else{
            $_SESSION['failed'] = '*Fail to add' . $db->error;
        }
        echo"
            <script>
                window.location.href = 'insert.php';
                </script>";
    }
 ?>
