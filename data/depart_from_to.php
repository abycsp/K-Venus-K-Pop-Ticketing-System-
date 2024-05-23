<?php 
require_once('database/Database.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}
$db = new Database();
$orig = $_SESSION['kgroup'];
$desti = $_SESSION['destination'];

$sqlOrig = "SELECT *
			FROM kgroup
			WHERE group_id = ?;
";
$kgroup = $db->getRow($sqlOrig, [$orig]);

$sqlDest = "SELECT *
			FROM destination
			WHERE dest_id = ?;
";
$dest = $db->getRow($sqlDest, [$desti]);



$db->Disconnect();