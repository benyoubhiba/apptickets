<?php
require('./config.php');
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$_SESSION['username'] = $username;
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `techn` WHERE username='$username' and password='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	
	if (mysqli_num_rows($result) == 1) {
		$user = mysqli_fetch_assoc($result);
		// vérifier si l'utilisateur est un administrateur ou un utilisateur
		if ($user['type'] == 'admin') {
			header('location: admin/home.php');		  
		}else{
			header('location: tsprofil/accueil.php');
		}
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}


if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$_SESSION['username'] = $username;
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	
	if (mysqli_num_rows($result) == 1) {
		$user = mysqli_fetch_assoc($result);
		// vérifier si l'utilisateur est un administrateur ou un utilisateur
		if ($user['type'] == 'admin') {
			header('location:  tsprofil/accueil.php');		  
		}else{
			header('location: userr/user/userSpace.php');
		}
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>