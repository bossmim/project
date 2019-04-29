<!DOCTYPE html>
<?php
session_start();
require_once('connect.php');
if(isset($_GET['tid'])){
	//echo "get";
	$_SESSION['tid'] = $_GET['tid'];
    $_SESSION['dest'] = $_GET['dept'];
    $_SESSION['arrt'] = $_GET['arrt'];
}
//echo $_SESSION['ticketid'];
if(isset($_POST['sub'])){
	$a = array();
	$a2 = array();
	for ($i = 0; $i<$_SESSION['seatno']; $i++) {
		$x = $_POST['seatno'.$i];
		array_push($a,$x);
	}
	
	$c = 0;
	for($j = 0; $j < count($a); $j++){
		if (in_array($a[$j], $a2)) {
			++$c;
			continue;
		}
		else{
			$a2[] = $a[$j];
		}
	}
	/*
	echo '<br>';
	print_r($a2);
	echo '<br>';
	echo "Count =".$c;
	*/
	if(($c == 0) and (!empty($a))){
		$_SESSION['ar'] = $a;
		$_SESSION['payment'] = $_POST['pay'];
		header("Location: info.php");
	}
}
?>
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
      <button class="btn dropdown-toggle btn-warning text-white" data-toggle="dropdown" contenteditable="false">USER</button>
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
          <li class="nav-item mx-2 text-light"> <a class="nav-link text-light" href="journey2.php">Journey</a> </li>
          <li class="nav-item mx-2 text-light"> <a class="nav-link text-light" href="booking_n.php">Booking</a> </li>
		  <li class="nav-item mx-2 text-light"> <a class="nav-link text-light" href="contact2.php">Contact Us</a> </li>
        </ul>
      </div>
    </div>
  </nav>


  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="navbar-nav">
              <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
              <li class="nav-item mx-2"><a class="nav-link text-dark" href="#">Select Train</a></li>
              <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
              <li class="nav-item mx-2" style=""><a class="nav-link text-dark" href="#"> Select Seat</a></li>
              <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
              <li class="nav-item mx-2"><a class="nav-link text-dark" href="#">Information</a></li>
              <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
              <li class="nav-item mx-2"><a class="nav-link text-dark" href="#">Payment</a></li>
              <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
              <li class="nav-item mx-2"><a class="nav-link text-dark" href="#">Ticket</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <br>
  <div class="py-5 border-dark" style="">
    <div class="container">
	
	<!--- form --->
	<form action="s_seat.php" method="POST">
      <div class="row" style="margin-left: 18em;">
		<div class="col-md-6">
         <p class="lead">Seat No</p>
		 </div>
			<div class="col-md-12">
			<?php
				
				for ($i = 0; $i<$_SESSION['seatno']; $i++) {
					echo '<select class="btn btn-outline-warning" name="seatno'.$i.'">';
					$q='SELECT Seat_No FROM seat_status WHERE Train_ID='.$_SESSION['tid'].' AND Available_Seat="Available";';
					if($result=mysqli_query($mysqli,$q)){
						while($row=mysqli_fetch_array($result)){
							echo '<option value="'.$row[0].'">'.$row[0].'</option>';
						}
						echo '</select><br>';
					}
					else{
						echo 'Query error: ';
					}
					echo '</select><br>';
				}
			?>
			</div>
	  
        </div>
		<br>
		<br>
		<div class="row" style="margin-left: 36em; margin-top: -14em;">
        <div class="col-md-12">
          <p class="lead">Payment (baht)</p>
          <div class="row">
            <div class="col-md-12">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
			<?php
				echo '<name="Payment">';
				$q = "SELECT cost FROM station WHERE Train_ID='".$_SESSION['tid']."';";
				if($result=mysqli_query($mysqli,$q)){
					$row=mysqli_fetch_array($result);
					echo '<input type="text" class="form-control w-50" name="pay" id="form2" value="'.$row[0]*$_SESSION['seatno'].'" readonly></div> ';
					
				}
				else{
					echo 'Query error: ';
				}
				
			
			?>
			
          </div>
			<br>
	<input type="submit" name="sub" value="SELECT" class="btn m-3 btn-warning text-white">
        </div>
    </div>
	
  </div>
  </form>
  <!---
  
  <center >
    <div class="py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-12"><a class="btn btn-warning text-light" href="info.php?tid=<?=$row['Train_ID']?>">SELECT</a></div>
        </div>
      </div>
    </div>
    <br>
  </center>
  
  --->
  
  
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
          <p class="mt-2 mb-0" contenteditable="true">© 1993-2018 TrainTick. All rights reserved</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>