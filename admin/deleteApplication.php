<?php
require_once '../core/init.php';
require_once('includes/header.php');
 if(isset($_GET['id'])){
    echo "<pre>";
      print_r($_GET);
    echo"</pre>";
    $id2 = $_GET['id2'];
    $id = $_GET['id'];
    //$sql = "UPDATE customers SET deleted = '1'  where id = '$id'";
   //  $db->query($sql);
   //  echo $db->error;
    $sql = "DELETE from applications  where cus_id = '$id' AND int_id = '$id2' ";
    $db->query($sql);
    echo $db->error;
    header('location:./index.php');
   //  echo "<a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete.php?id=".$query2['id']."'>x</a>"; 
 }