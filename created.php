<?php
require_once './core/init.php';
if(isset($_SESSION['logged_in'])){
    echo "Bad Request";
    die();
}
require_once 'helpers/helpers.php';
	if(isset($_POST['submit'])){
		// $ip = getIp();
		$fullname = sanitize($_POST['fullname']);
		$email = sanitize($_POST['email']);
		$password = sanitize($_POST['password']);
		$address1 = sanitize($_POST['address1']);
		$city = sanitize($_POST['city']);
		$phone = sanitize($_POST['phone']);
        
		
        if(!empty($fullname) && !empty($password) && !empty($address1) && !empty($city) && !empty($phone)){
            $fetch = "select email from customers where `email` = '$email'";
            $result = $db->query($fetch);
            echo gettype($result);
            if($result->num_rows >=1){
                echo "Account already exists";
                $_SESSION['error'] = "*User Email already exists*";
                header('location: register.php');
                exit();
            }
        
            if(strlen($password)<8){
                $_SESSION['error'] = "*Password must be greater or equal to 8 characters**";
                header('location: register.php');   
                exit();
            }

                
            $match = '/@pcampus.edu.np/';
            if(preg_match($match, $email)){
                $_SESSION['created'] = "Account successfully created";
                $insertCus = "INSERT INTO customers (fullname,email,password,address1,city,phone) VALUES ('$fullname','$email','$password','$address1','$city','$phone')";
                $db->query($insertCus);
                
                header('location: register.php');
                die();
            }
            
            else{
                $_SESSION['error'] = "*Please login with your college email*";
                header('location: register.php');
                die();
                echo "college mail";
            }
                            }
                            else{
                                $_SESSION['error'] = "*Please fill out all the form*";
                                header('location: register.php');
                            }
            } 