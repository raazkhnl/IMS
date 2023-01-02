<?php
	require_once '../core/init.php';
    // echo "<pre>";
    // print_r($_POST);
    // die;
// $value = $_POST['type'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$cus_id = $_POST['cus_id'];
$int_id = $_POST['int_id'];
$value = $_POST['workstatus'];
$sql = "SELECT * FROM applications a INNER JOIN customers c ON a.cus_id = c.id INNER JOIN internships i ON a.int_id = i.id INNER JOIN employer_account e ON i.employer_id=e.employer_id AND a.cus_id = '$cus_id' and a.int_id = '$int_id'";
$applications = $db->query($sql);
$application = $applications->fetch_all(MYSQLI_ASSOC);
// echo"<pre>";
// print_r($application);
// echo "HI";
// die;

foreach($application as $application){
    $name = $application['fullname'];
    $email = $application['email'];
    $company = $application['employer_name'];
    $address = $application['location'];
    $category = $application['category'];
    $duration = $application['duration'];
if($value == 'interning'){
    $sql2 = "Select * from student_location where email = '$email' and category = '$category' and company = '$company'";
    $execute1 = $db->query($sql2);
    $executess = $execute1->fetch_all(MYSQLI_ASSOC);
    // echo mysqli_num_rows($execute1);
    if(mysqli_num_rows($execute1)<1)
    {

        // echo "HI";
        $sql1 = "Insert into student_location(name,email,company,address,category,duration) values('$name','$email','$company','$address','$category','$duration') ";
        $executed = $db->query($sql1);
        
}
    
}if($value=='not interning'){
    $sql3 = "Delete from student_location where email = '$email' and category = '$category' and company = '$company'";
    $run = $db->query($sql3);
    // echo $db->error;
    // die();
}
}
    $sql2 = "Update applications  set workstatus = '$value' where cus_id = '$cus_id' and int_id = '$int_id'";
    $db->error;
    $execute = $db->query($sql2);
}
header('location:index.php');
