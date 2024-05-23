<?php 
require_once('database/Database.php');
$db = new Database();
$sql = "SELECT *
		FROM kgroup;
";

$kgroups = $db->getRows($sql);

$db->Disconnect();

