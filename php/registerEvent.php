<?php
	require_once("database.php");
	session_start();
	if(isset($_SESSION['username'])) {
		$username = addslashes($_SESSION['username']);
		$eventName = addslashes($_POST['eventName']);
		$eventdescription = addslashes($_POST['eventdescription']);
		$eventRules = addslashes($_POST['eventRules']);
		$coordinator1 = addslashes($_POST['coordinator1']);
		$coordinator2 = addslashes($_POST['coordinator2']);
		$phone1 = addslashes($_POST['phone1']);
		$phone2 = addslashes($_POST['phone2']);
		$time = addslashes($_POST['time']);
		$venue = addslashes($_POST['venue']);
		$category = addslashes($_POST['category']);
		if(empty($_POST['eventid'])) {
			//Register new Event
			$_POST['eventName'] = addslashes($_POST['eventName']);
			$sql = "insert into events(author,eventname,description,rules,coordinator1,coordinator2,phone1,phone2,
					time,venue,category) values('$username','$eventName','$eventdescription'
					,'$eventRules','$coordinator1','$coordinator2','$phone1'
					,'$phone2','$time','$venue','$category')";
			
			$result = $db->query($sql);
			//echo $result;
			if($result ) 
				header("Location:../html/event.html");
		}
		else {
			//Update the Existing Event
			$sql = "update events set eventname = '$eventName',description = '$eventdescription', rules = '$eventRules'
					,coordinator1 = '$coordinator1', coordinator2 = '$coordinator2'
					,phone1 = '$phone1',phone2 = '$phone2'
					,time = '$time',venue = '$venue',category = '$category' 
					where eventid = '$_POST[eventid]'";
			
			$result = $db->query($sql);
			//echo $result;
			header("Location:../html/event.html");
		}
	
	}
	else {
		header("Location:../");
	}

?>