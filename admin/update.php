<?php
    require_once '../core/init.php';
    require_once './includes/header.php';
    if(isset($_GET['id']))
        $_SESSION['id'] = $_GET['id'];
    $id = $_SESSION['id'];
    $select = "SELECT * FROM internships i INNER JOIN employer_account e ON i.employer_id=e.employer_id AND id = $id";
    $query = $db->query($select);
    $result = [];
    while($results = $query->fetch_assoc()){
        $resul[] = $results;
        $result = $resul[0];
        // echo "<pre>";
        // print_r($result);
        // echo"</pre>";
    }
?>

<div class="ml-5 pl-5">
 <a href="insert.php" style="background-color:purple;color:white" class="btn btn-sm"><i style="color:white"class="fas fa-arrow-circle-left">Back</i></a>
</div>

<div class=" col-md-10 container my-4 card">
    <h3 class="text-center mt-5 card-header">Update Internship Field</h3>
    <form action="update.php" method="POST">
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Name Of Company :</label>
            <input type="text" class="form-control" name="nameOfCompany" value = "<?php echo $result['employer_name']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Category :</label>
            <input type="text" class="form-control" name="category" value="<?php echo $result['category']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Duration :</label>
            <input type="text" class="form-control" name="duration" value = "<?php echo $result['duration']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Stipend :</label>
            <input type="text" class="form-control" name="stipend" value="<?php echo $result['stipend']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Available Position :</label>
            <input type="text" class="form-control" name="availablePosition" value="<?php echo $result['positions']?>">
        </div>
        
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Perks :</label>
            <input type="text" name="perks" class="form-control" value="<?php echo $result['perks']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">About Internship :</label>
            <textarea class="form-control" name="aboutInternship" rows="6" style="resize:none;" ><?php echo $result['aboutInternship']?></textarea>
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">Who Can Apply :</label>
            <textarea class="form-control" name = "whoCanApply" rows="6" style="resize:none;" ><?php echo $result['whoCanApply']?></textarea>
        </div>
        
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">Deadline :</label>
            <input type="date" class="form-control" name = "applyBy" rows="6" style="resize:none;" value="<?php echo $result['applyBy']?>" >
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlTextarea1">Interview Date :</label>
            <input type="date" class="form-control" name = "interview_date" rows="6" style="resize:none;" value="<?php echo $result['interview_date']?>">
        </div>
        <div class="form-group card-body">
            <button type="submit" class="btn btn-primary font-weight-bold" name = "updateButton">Update</button>
        </div>
    </form>
    
</div>

<?php
    if(isset($_POST['updateButton'])){
        $category = sanitize($_POST['category']);
        $duration = (int)sanitize($_POST['duration']);
        $stipend = (int)sanitize($_POST['stipend']);
        $availablePosition = (int)sanitize($_POST['availablePosition']);
        $perks = sanitize($_POST['perks']);
        $aboutInternship = sanitize($_POST['aboutInternship']);
        $whoCanApply = sanitize($_POST['whoCanApply']);
        $interview_date = $_POST['interview_date'];
        $applyBy =$_POST['applyBy'];
        $id = $_SESSION['id'];
        $update = "UPDATE internships 
                SET 
                    category = '$category', 
                    duration = '$duration', 
                    stipend = '$stipend', 
                    positions = '$availablePosition', 
                    perks = '$perks', 
                    aboutInternship = '$aboutInternship',  
                    whoCanApply = '$whoCanApply', 
                    interview_date = '$interview_date',
                    applyBy = '$applyBy' 
                WHERE id = '$id'";

        $updated = $db->query($update);
        if($updated){
            $_SESSION['updated'] = 'Successfully Updated !!!';
            unset($_SESSION['id']);
            header('location: insert.php');
        }else{
            echo $db->error;
        }
}
?>