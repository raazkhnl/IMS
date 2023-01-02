<?php
    require_once '../core/init.php';
    // echo "<script></script>"
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        echo $id;
        $delete = "Delete from internships where id = $id";
        $result = $db->query($delete);
        if($result){
            $_SESSION['deleted'] = "Deleted Successfully !!!";
            header('location: internship.php');
        }
    }
if(isset($_GET['deleteAll'])==1){

    $currentdate = date('Y-m-d');
    echo "hello";
        
        $sql1 = "Delete from internships where interview_date < '$currentdate'";
        $trues = $db->query($sql1);
        $db->error;
        if($trues){
            echo "Suceess";
        }
        header('location: internship.php');
    
       
     }?>