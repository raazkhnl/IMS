<?php
    require_once '../core/init.php';
    require_once './includes/header.php';
    if(isset($_GET['id']))
        $_SESSION['id'] = $_GET['id'];
    $id = $_SESSION['id'];
    $select = "SELECT * FROM student_location  WHERE id = $id";
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
 <a href="studentLocation.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-left">Back</i></a>
</div>

<div class=" col-md-10 container my-4 card">
    <h3 class="text-center mt-5 card-header">Add New Student Record</h3>
    <form action="updatestudent.php" method="POST">
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Name Of Students :</label>
            <input type="text" class="form-control" name="name" value="<?php echo $result['name']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Student Email :</label>
            <input type="email" class="form-control" name="email" value = "<?php echo $result['email']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Name Of Company :</label>
            <input type="text" class="form-control" name="company" value="<?php echo $result['company']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Category :</label>
            <input type="text" class="form-control" name="category" value="<?php echo $result['category']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Location :</label>
            <input type="text" class="form-control" name="address" value="<?php echo $result['address']?>">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Duration :</label>
            <input type="text" class="form-control" name="duration" value="<?php echo $result['duration']?>">
        </div>
        
        <div class="form-group card-body">
            <button type="submit" class="btn btn-primary font-weight-bold" name = "updateButton">Update</button>
        </div>
    </form>
    
</div>

<?php
    if(isset($_POST['updateButton'])){
        $name = sanitize($_POST['name']);
        $category = sanitize($_POST['category']);
        $address = sanitize($_POST['address']);
        $email = sanitize($_POST['email']);
        $company = sanitize($_POST['company']);
        $duration = sanitize($_POST['duration']);
        $id = $_SESSION['id'];
            $update = "UPDATE student_location 
                    SET 
                        category = '$category',
                        address = '$address', 
                        email = '$email', 
                        company = '$company', 
                        name = '$name' ,
                        duration = '$duration'
                    WHERE id = $id";
    
            $updated = $db->query($update);
            if($updated){
                $_SESSION['updated'] = 'Successfully Updated !!!';
                unset($_SESSION['id']);
                header('location: studentLocation.php');
            }else{
                echo $db->error;
            }
    }
?>