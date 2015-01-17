<?php
	require_once("database.php");
	$sql = "delete from events where eventid = '$_POST[eventID]'";
	$result = $db->query($sql);
	
?>