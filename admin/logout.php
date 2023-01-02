<?php 
	session_start();
	session_destroy();
	echo "<script>window.open('index.php','_self')</script>";
?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/footer.php';?>