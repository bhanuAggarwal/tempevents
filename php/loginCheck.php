<?php
	require_once("database.php");
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "select * from users where username ='". $username . "' AND password='". $password ."'";
	
	$result = $db->query($sql);
	if($check = mysqli_fetch_array($result)) {
		$_SESSION['username'] = $username;
		header("Location:../html/event.html");
	}
	else {
		header("Location:../");
	}
	
	

?>