
<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database

   $db = "SELECT * FROM utenti";
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $Nome = mysqli_real_escape_string($db, $_POST['Nome']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $Cognome = mysqli_real_escape_string($db, $_POST['Cognome']);
  $Genere = mysqli_real_escape_string($db, $_POST['Genere']);
  $Data_di_nascita = mysqli_real_escape_string($db, $_POST['Data_di_nascita']);
  $Luogo_di_nascita = mysqli_real_escape_string($db, $_POST['Luogo_di_nascita']);
  $telefono = mysqli_real_escape_string($db, $_POST['telefono']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Nome)) { array_push($errors, "Il nome è richiesto"); }
  if (empty($email)) { array_push($errors, "L'Email è richiesta"); }
  if (empty($password_1)) { array_push($errors, "La Password è richiesta"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Le due password non corrispondono");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM utenti WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "L'email è già in uso");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($password_1);//cripto la password

  	$query = "INSERT INTO utenti (Id, Nome, Cognome, Genere, Data_di_nascita, Luogo_di_nascita, email, password, telefono) 
  			  VALUES(NULL, '$Nome', '$Cognome', '$Genere','$Data_di_nascita', '$Luogo_di_nascita', '$email', '$password', '$telefono')";
  	mysqli_query($db, $query);
  	$_SESSION['Name'] = $username;
  	$_SESSION['success'] = "Benvenuto...";
  	header('location: index.php');
  }
}
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Email Necessaria");
  }
  if (empty($password)) {
  	array_push($errors, "Password Necessaria");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM utenti WHERE email='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $Nome;
  	  $_SESSION['success'] = "Benvenuto...";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Email o Password sbagliata");
  	}
  }
}

?>