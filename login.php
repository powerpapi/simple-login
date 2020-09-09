<?php
require('db.php');

if(isset($_POST['submit'])){
		if(empty($_POST['username']) || empty($_POST['password'])){
			$error = 'Username and password is invalid';
	} else {
		$username = $_POST['username'];
		$password = $_POST['password'];
	}
	$query = mysqli_query($conm, "SELECT * FROM login WHERE username='$username' AND password='$password'");

	$rows = mysqli_num_rows($query);
	if($rows == 1){
		$_SESSION['username'] = $username;
		header("Refresh: 1; url=main.php");

	} else {
		$error = 'Username and password is invalid';
	}

	mysqli_close($conn);
}