<?php
	require_once("database.php");
	session_start();
	$sql = "select eventid,eventname from events where author = 'finearts'";
	
	$resultSet = $db->query($sql);
	$i = 0;
	while($result = mysqli_fetch_array($resultSet)) {
		$list[$i++] = array($result['eventid']=>$result['eventname']); 
		
	}
	echo json_encode($list);

?>