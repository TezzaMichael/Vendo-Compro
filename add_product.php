<?php
session_start();
include "db.php";
if (isset($_POST["Nome"])) {

	$nome = $_POST["nome"];
	$modalità = $_POST["modalità"];
	$tipo = $_POST['tipo'];
	$condizioni = $_POST['condizioni'];
	$disponibilità = $_POST['disponibilità'];
	$descrizione = $_POST['descrizione'];
	$costo = $_POST['costo'];
	$immagine = $_POST['immagine'];
	$name = "/^[a-zA-Z ]+$/";
	$number = "/^[0-9]+$/";

if(empty($nome) || empty($modalità) || empty($tipo) || empty($condizioni) || empty($disponibilità) || empty($descrizione) || empty($costo) || empty($immagine)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Riempi tutti i campi...!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($number,$costo)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>questo $costo non è valido!</b>
			</div>
		";
		exit();
	}
	
	
		include "db.php";
		$sql = "INSERT INTO `Prodotto` 
		(`Codice_prodotto`, `id_utente`, `Modalità`, `Nome_prodotto`, 
		`tipo`, `condizioni`, `disponibilità`, `descrizione`, 'costo', 'immagine') 
		VALUES (NULL, 1, '$modalità', '$nome', '$tipo', '$condizioni', '$disponibilità', '$descrizione', 
		'$costo', '$immagine')";
		$run_query = mysqli_query($con,$sql);
		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["nome"] = $nome;
		$ip_add = getenv("REMOTE_ADDR");
		if(mysqli_query($con,$sql)){
			echo "Prodotto inserito con successo";
			echo "<script> location.href='store.php'; </script>";
            exit;
		}
	}
	
}



?>