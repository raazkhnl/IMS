
<!DOCTYPE html>
<?php require_once 'includes/functions.php';
echo"<link href='../assets/sweetalert.min.css' rel='stylesheet' />
<script src='../assets/sweetalert.min.js'></script>";?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Panel</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">  
  
</head>
<style>
html body{
  background-color: #E0F8E6;
  z-index: 1;
}
a{
  margin: 10px;
  font-weight: 400;
}
</style>

<body>
  <header>
    <!--Navbar -->
    <?php 
            if(isset($_SESSION['admin_logged_in'])){
              echo 
              "<nav class='mb-1 navbar navbar-expand-lg navbar-dark purple' style='height: 70px; font-size:18px;'>
              <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent-333'
              aria-controls='navbarSupportedContent-333' aria-expanded='false' aria-label='Toggle navigation'>
              <span class='navbar-toggler-icon'></span>
              </button>
              <div class='collapse navbar-collapse' id='navbarSupportedContent-333'>
                <ul class='navbar-nav mr-auto'>
                  <li class='nav-item'>
                    <a class='nav-link' href='index.php'><i class='fas fa-envelope'></i> Applications</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='insert.php'><i class='fas fa-calendar-check'></i> Current Internship</a>
                  </li>
          
                  <div class = ''>
                  <li class='nav-item'><a href='studentLocation.php' class='nav-link' style='border-radius: 10em;'><i class='fas fa-hammer'></i> Students Working</a></li></div>
                  <li class='nav-item'>
                    <a class='nav-link' href='internship.php'><i class='fas fa-history'></i> History</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='manageadmins.php'><i class='fas fa-cog'></i>Manage Admins</a>
                  </li>
                </ul>

                <ul class='nav navbar-nav ml-auto'>
                <div class='dropdown show text-white mr-4'> 
                  <a style = 'color:white'class=' dropdown-toggle' href='' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='false' aria-expanded='false'>
                    <i class='fas fa-user-circle fa-2x' style = 'color:white'></i>
                  </a>
                  <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuLink' style='margin:10px;background-color:purple'>
                    <a class='dropdown-item' href='./adminaccount.php'><i style='color:white' class = 'fas fa-user'> My Profile</i></a>
                    <a class='dropdown-item' href='./editaccount.php'><i style='color:white' class = 'fas fa-edit'> Edit Account</i></a>
                    <a class='dropdown-item' href='./logout.php'><i style='color:white' class = 'fas fa-sign-out-alt'> Log Out</i></a>
                  </div>
                </div>
              </ul>
              </nav>";
            }
            ?>      
        
    <!--/.Navbar -->
  </header>