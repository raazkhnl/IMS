<?php
require_once '../core/init.php';
require_once('includes/header.php');
if(!isset($_SESSION['admin_logged_in'])){
   echo "<script>window.open('login.php','_self')</script>";
 }
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "UPDATE admin SET verify='1' where id ='$id' ";
    $db->query($sql);
    echo $db->error;
    header('location:./manageadmins.php');
 }