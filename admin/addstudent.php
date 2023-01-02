<?php
require_once '../core/init.php';
require_once './includes/header.php';
echo ' <div class="ml-5 pl-5">
 <a href="studentLocation.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-left">Back</i></a>
</div>

<div class=" col-md-10 container my-4 card">
    <h3 class="text-center mt-5 card-header">Add New Student Record</h3>
    <form action="addstudent.php" method="POST">
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Name Of Students :</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Student Email :</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Name Of Company :</label>
            <input type="text" class="form-control" name="company">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Category :</label>
            <input type="text" class="form-control" name="category">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Location :</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group card-body">
            <label for="exampleFormControlInput1">Duration :</label>
            <input type="text" class="form-control" name="duration">
        </div>
        
        <div class="form-group card-body">
            <button type="submit" class="btn btn-primary font-weight-bold" name = "addStudent">Add</button>
        </div>
    </form>
    
</div>';

    if(isset($_POST['addStudent'])){
        $name = sanitize($_POST['name']);
        $category = sanitize($_POST['category']);
        $address = sanitize($_POST['address']);
        $email = sanitize($_POST['email']);
        $company = sanitize($_POST['company']);
        $duration = sanitize($_POST['duration']);
        
        
        $insertList = "INSERT INTO student_location (`category`,`company`,`name`,`email`,`address`,`duration`) values('$category','$company','$name','$email','$address','$duration')";
        $query = $db->query($insertList);
        if($query){
            $_SESSION['added'] = 'New Students Record Successfully added !!!';
        }
        else{
            $_SESSION['failed'] = '*Fail to add' . $db->error;
        }
        echo"
            <script>
                window.location.href = 'studentLocation.php';
                </script>";
    }
 ?>