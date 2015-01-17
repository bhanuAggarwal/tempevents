<?php
	require_once("database.php");
	$eventid = $_POST['eventID'];
	$sql = "select * from events where eventid = ". $eventid;
	$result = $db->query($sql);
	$eventDetails = mysqli_fetch_array($result);
	echo json_encode($eventDetails);

?>