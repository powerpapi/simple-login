<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

    <?php
	include('db.php');
	session_start();
if(isset($_POST['submit'])){
		if(empty($_POST['username']) || empty($_POST['password'])){
			$error = 'Username and password is invalid';
	} else {
		$username = $_POST['username'];
		$password = $_POST['password'];
	}
	$query = mysqli_query($con, "SELECT * FROM users WHERE `username`='$username' AND `password`='$password'");

	$rows = mysqli_num_rows($query);
	if($rows == 1){
		$_SESSION['username'] = $username;
		header("Refresh: 1; url=main.php");

	} else {
		$error = 'Username and password is invalid';
	}
	mysqli_close($con);
}
?>
	<form action="" method="POST">


  <label>Username  :</label><input type = "text" name = "username"/><br /><br />
 <label>Password  :</label><input type = "password" name = "password"/><br/><br />
 <input type ="submit" value ="Submit" name="submit"/><br />
<?php echo $error; ?>



</form>

    </form>
</body>
</html>