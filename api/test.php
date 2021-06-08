<?php
	// Initialiser la session
	session_start();
  
$connection = mysqli_connect("localhost","root","","appticket");
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location:../login.php");
		exit(); 
	}
?>
