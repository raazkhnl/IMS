<?php
require_once '../core/init.php';
require_once('includes/header.php');
 if(isset($_GET['id'])){
   //  echo "hello";
    $id = $_GET['id'];
     
    $sql = "UPDATE applications SET status = 'approved'  where int_id = '$id'";
    $db->query($sql);
    echo $db->error;
    header('location:./index.php');
 }
 if(isset($_GET['all'])){
   //  echo "hello";
    $id = $_GET['id'];
     
    $sql = "UPDATE applications SET status = 'approved'";
    $db->query($sql);
    echo $db->error;
    header('location:./index.php');
 }