<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if( isset($_POST['oid']) && isset($_POST['did']) && isset($_POST['dd']) ){
	$kgroup = $_POST['oid'];
	$destination = $_POST['did'];
	$departureDate = $_POST['dd'];

	$_SESSION['kgroup'] = $kgroup;
	$_SESSION['destination'] = $destination;
	$_SESSION['departure_date'] = $departureDate;
	$_SESSION['tracker'] = uniqid();

	$return['url'] = 'accomodation.php';
	$return['valid'] = true;

	echo json_encode($return);
}//end isset