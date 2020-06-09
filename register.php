<?php
session_start();
include "db.php";
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$genere = $_POST['genere'];
	$datanascita = $_POST['datanascita'];
	$luogonascita = $_POST['luogonascita'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
	$luogodnascita = "/^[a-zA-Z ]+$/";

if(empty($f_name) || empty($l_name) || empty($genere) || empty($datanascita) || empty($luogonascita) || empty($email) || empty($password) || empty($repassword || $mobile = $_POST['mobile'])){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$f_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>questo $f_name non è valido!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>questo $l_name non è valido!</b>
			</div>
		";
		exit();
	}
	
	if(!preg_match($luogodnascita,$luogonascita)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>questo $luogonascita non è valido!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>questo $email non è valido!</b>
			</div>
		";
		exit();
	}
	if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password è poco sicura</b>
			</div>
		";
		exit();
	}
	if(strlen($repassword) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password è poco sicura</b>
			</div>
		";
		exit();
	}
	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>password non corrispondono</b>
			</div>
		";
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>il numero $mobile non è valido</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Il numero di telefono deve avere 10 numeri</b>
			</div>
		";
		exit();
	}
	//verifica se esiste già l'email nel database
	$sql = "SELECT Id FROM utenti WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>sei già registrato, vai al login</b>
			</div>
		";
		exit();
	} else {
		include "db.php";
		$sql = "INSERT INTO `utenti` 
		(`Id`, `Nome`, `Cognome`, `Genere`, 
		`Data_di_nascita`, `Luogo_di_nascita`, `email`, `password`, 'telefono') 
		VALUES (NULL, '$f_name', '$l_name', '$genere', '$datanascita', '$luogonascita', '$email', 
		'$password', '$mobile')";
		$run_query = mysqli_query($con,$sql);
		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["name"] = $f_name;
		$ip_add = getenv("REMOTE_ADDR");
		if(mysqli_query($con,$sql)){
			echo "zione avvenuta con successo";
			echo "<script> location.href='store.php'; </script>";
            exit();
		}
	}
	}
	
}



?>






















































