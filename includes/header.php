<!DOCTYPE html>
<?php require_once 'core/init.php';
echo "<link href='./assets/sweetalert.min.css' rel='stylesheet' />
<script src='./assets/sweetalert.min.js'></script>"; ?>

  
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Internship management</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&display=swap" rel="stylesheet">

  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <style>
    

    nav {
      font-size: 18px;
    }

    body{
      font-family: 'Playfair Display', serif;
      font-family: 'Playfair Display', serif;
      font-family: 'Open Sans', sans-serif;
      
    }
    h3, h2 {
      font-family: 'Open Sans', sans-serif;
      font-family: 'Playfair Display', serif;
      
        
    }
    header nav{
      position: sticky;
      top:0;
    }
    
  </style>
</head>

<body>
  <header class="postion-absolute">
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-primary postion-fixed">
      <a class="navbar-brand ml-4" href="index.php"><img src="./img/tulogo.png" alt="Error" class='navbar-brand' height="60px" style="border-radius: 50%;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><b><i class="fas fa-home"></i> Home</b></a>
          </li>
          
        </ul>

        <?php
        if (!isset($_SESSION['logged_in'])) {
          echo "
                <ul class='nav navbar-nav ml-auto'>
                <li class='nav-item'><a href='myaccount.php' class='nav-link' style='border-radius: 10em;' style = 'text-align:right;''><b><i class='fas fa-sign-in-alt'></i> Login</b></a></li>
                <li class = 'nav-item text-white'style = 'padding-top:10px;'>/</li>
              
                <li class='nav-item'><a href='register.php' class='nav-link mr-auto' style='border-radius: 10em;'><b><i class='fas fa-user-plus'> </i> Signup</b></a></li>
                </ul>
                ";
        } else {

                ?><?php 
                echo " <ul class='nav navbar-nav ml-auto'>
                <div class='dropdown show text-white mr-4'> 
                <a class=' dropdown-toggle' href='' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='false' aria-expanded='false'>
                <i class='fas fa-user-circle fa-2x' style = 'color:white'></i>
                </a>
              
                <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuLink' style='margin:10px;'>
                  <a class='dropdown-item' href='./myaccount.php'><i class = 'fas fa-user'> My Profile</i></a>
                  <a class='dropdown-item' href='./edit_account.php'><i class = 'fas fa-edit'> Edit Account</i></a>
                  <a class='dropdown-item' href='./logout.php'><i class = 'fas fa-sign-out-alt'> Log Out</i></a>
                </div>
              </div>
              </ul>
               ";
        }
        ?>

      </div>
    </nav>
    <!--/.Navbar -->
  </header>