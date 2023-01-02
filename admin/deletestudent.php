<?php
    require_once '../core/init.php';
    $id = $_GET['id'];
    $delete = "Delete from student_location where id = $id";
    $result = $db->query($delete);
    if($result){
        $_SESSION['deleted'] = "Deleted Successfully !!!";
        header('location: studentLocation.php');
    }