<?php 

if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(isset($_SESSION['tracker'])){
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>K-Venus</title>

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

	</head>
<body style="background-color: pink;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">K-Venus Online Ticketing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active">
      	<a href="#">Rerservation
      	<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
      	</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-backward"></span> logout</a></li>
    </ul>
  </div>
</nav>


<div class="container-fluid">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">STEPS FOR BOOKING</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">1. CONCERT INFO
								</h3>
							</div>
							<div class="panel-body">
							SCHEDULE OF CONCERT
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">2. ACCOMODATION
								<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
								</h3>
							</div>
							<div class="panel-body">
								ACCOMODATION TYPE
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">3. CUSTOMER INFO</h3>
							</div>
							<div class="panel-body">
							CUSTOMER DETAILS
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title">4. PAYMENT INFO</h3>
							</div>
							<div class="panel-body">
								TOTAL PAYMENT
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="container-fluid">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-body">
			 <h2>
			 	<center>TICKET RESERVATION INFO</center>
			 </h2>
			 <br />
			 <div class="panel panel-success">
			 	<div class="panel-heading">
			 		<h3 class="panel-title"><center>TICKET INFO</center></h3>
			 	</div>
			 	<div class="panel-body">
			 		<strong>
			 			<i>K-Venus Online Ticketing</i>
			 			<h3>
			 			<?php require_once('data/depart_from_to.php'); 
			 				echo $kgroup['group_desc'];
			 			?>
			 			 - 
			 			 <?= $dest['dest_destination']; ?>
			 			 </h3>
			 			<p>Concert Date: <?= $_SESSION['departure_date']; ?></p>
			 		</strong>
			 			<strong>
						 <p>Seat Location: 
						 <?php require_once('data/get_accomodation.php'); 
			 					echo $accomodation['acc_type'];
			 				?> </p>
			 			</strong>
			 	</div>
			 </div>

			 <div class="panel panel-success">
			 	<div class="panel-heading">
			 		<h3 class="panel-title">CONTACT INFO</h3>
			 	</div>
			 	<div class="panel-body">
			 	<?php require_once('data/getBooked.php'); ?>
			 	<strong>Booked By:</strong> <?= ucwords($bookByInfo['book_by']);  ?><br /> 
			 	<strong>Contact #:</strong> <?= $bookByInfo['book_contact']; ?><br />
			 	<strong>Email Address:</strong> <?= $bookByInfo['book_address']; ?><br />
			 	</div>
			 </div>
				<div class="container-fluid">
				<strong>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				CUSTOMERS</strong>
					<table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
							    <tr>
							        <th>
							        	<center>
							       			Name
							        	</center> 
							        </th>
							        <th>
							        	<center>
							        		Age
							        	</center>
						        	</th>
							        <th>
							        	<center>
							        		Gender
							        	</center>
						        	</th>
						        	 <th>
							        	<center>
							        		Seating Chart Price
							        	</center>
						        	</th>
							    </tr>
							</thead>
						    <tbody>
						    <?php
						    	require_once('data/getBooked.php');
						    	$totalPayment = 0;
						    	$tracker = '';
						     foreach($bookPass as $bp): 
						    	$name = $bp['book_name'];
						    	$name = ucwords($name);
						    	$price = $bp['acc_price'];
						    	$totalPayment += $price;
						    	$tracker = $bp['book_tracker'];
						    ?>
						    	<tr align="center">
						    		<td><?= $name; ?></td>
						    		<td><?= $bp['book_age']; ?></td>
						    		<td><?= $bp['book_gender']; ?></td>
						    		<td><?= $price; ?></td>
						    	</tr>
						    <?php endforeach; ?>
						    	<tr>
						    		<td></td>
						    		<td></td>
						    		<td align="right"><strong>TOTAL:</strong></td>
						    		<td align="center"><strong><?= $totalPayment; ?></strong></td>
						    	</tr>
						    </tbody>
						    <strong>- Booked ID: <?= $tracker; ?></strong>
						   </table>
						   <center>
							   <a href="index.php" class="btn btn-success">Return Home
								   <span class="glyphicon glyphicon-backward" aria-hidden="true"></span>
							   </a>
						   </center>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>



</body>
</html>

<?php
}else{
	echo '<strong>';
	echo 'Page Not Exist';
	echo '</strong>';
}//end if else isset

 ?>