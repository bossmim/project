<?php
session_start();

require_once('connect.php');
                $uid = $_SESSION['User_ID'];
                $q = "SELECT * FROM users WHERE User_ID = $uid";
                $result = mysqli_query($mysqli,$q);

                $urow = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.1.3.css">
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-light">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar6">
        <ul class="navbar-nav mx-auto">
		 <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <img class="img-fluid d-block rounded-circle" src="/pic/logo.jpg" style="width:140px;height:140px;"></ul>
      </div>
    </div>
    <div class="btn-group">
      <button class="btn dropdown-toggle btn-warning text-white" data-toggle="dropdown" contenteditable="true">USER</button>
	  <div class="dropdown-divider"></div> <a class="dropdown-item border-warning" href="noti.php">Notification</a>
      <div class="dropdown-menu"> <a class="dropdown-item border-warning" href="user_p.php">My Profile</a>
        <div class="dropdown-divider"></div> <a class="dropdown-item border-warning" href="history.php">History</a>
        <div class="dropdown-divider"></div> <a class="dropdown-item" href="homepage.php">Log Out</a>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container justify-content-center"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar9">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar9">
        <ul class="navbar-nav">
          <li class="nav-item mx-2"> <a class="nav-link text-light" href="homepage2.php">Homepage</a> </li>
          <li class="nav-item mx-2 text-light"> <a class="nav-link text-light" href="journey.php">Journey</a> </li>
          <li class="nav-item mx-2 text-light"> <a class="nav-link text-light" href="booking_n.php">Booking</a> </li>
		  <li class="nav-item mx-2 text-light"> <a class="nav-link text-light" href="contact.php">Contact Us</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  
  
      <div class="py-5">
    <div class="container">
        <center><div class="col-md-2" style=""><img class="img-fluid d-block rounded-circle" src="/pic/cute.jpg"></div></center>
      </div>
    </div>
  </div>
  <form action="edit_user_pu.php" method="POST">
  <div class="py-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <font size="5">User Info<br><br></font>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style="">
		  <p contenteditable="false"><font size="3">&nbsp; Name:</p>
		  <input type="text" class="form-control m-2 w-50" name="fname" value="<?=$urow['First_Name']?>" > 		  
		  <p contenteditable="false"><font size="3">&nbsp; Surname:</p>
		  <input type="text" class="form-control m-2 w-50" name="lname" value="<?=$urow['Last_Name']?>" > 		  
		  <p contenteditable="false"><font size="3">&nbsp; Email:</p>
		  <input type="email" class="form-control m-2 w-50" name="email" value="<?=$urow['Email']?>"> 
		  <p contenteditable="false"><font size="3">&nbsp; Password:</p>
		  <input type="password" class="form-control m-2 w-50" name="pass" value="<?=$urow['Password']?>">
		  <p contenteditable="false"><font size="3">&nbsp; National ID:</p>
		  <input type="text" class="form-control m-2 w-50" name="naid" value="<?=$urow['National_ID']?>" > 
          <p contenteditable="false"><font size="3">&nbsp; Birthday:</p>
		  <input type="text" class="form-control m-2 w-50" name="DOB" value="<?=$urow['Birth_Date']?>" > 
		  <p contenteditable="false"><font size="3">&nbsp; Tel:</p>
		  <input type="text" class="form-control m-2 w-50" name="tel" value="<?=$urow['Tel']?>"> 
		  <p contenteditable="false"><font size="3">&nbsp; Address:</p>
		  <input type="text" class="form-control m-2 w-50" name="address" value="<?=$urow['Address']?>">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>
        <center><input class="btn m-3 btn-warning text-white" type="submit" value="CONFIRM"></input></center>
    </div>
  </div>
  </form>
  
  
    <br>
  <br>
  <br>
  <hr>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center d-md-flex align-items-center"> <i class="d-block fa fa-stop-circle fa-2x mr-md-5 text-warning"></i>
          <ul class="nav mx-md-auto d-flex justify-content-center">
            <li class="nav-item"> <a class="nav-link active" href="#">&nbsp;</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">&nbsp;</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">&nbsp;</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">&nbsp;</a> </li>
          </ul>
          <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-md-between justify-content-center my-2"> <a href="#">
                <i class="d-block fa fa-facebook-official text-muted fa-lg mx-2"></i>
              </a> <a href="#">
                <i class="d-block fa fa-instagram text-muted fa-lg mx-2"></i>
              </a> <a href="#">
                <i class="d-block fa fa-twitter text-muted fa-lg ml-2"></i>
              </a> </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mt-2 mb-0" contenteditable="false">© 1993-2018 TrainTick. All rights reserved</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>


