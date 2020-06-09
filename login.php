<?php
include "db.php";

session_start();

if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$password = $_POST["password"];
	$sql = "SELECT * FROM utenti WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
    $row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["Id"];
		$_SESSION["name"] = $row["Nome"];
		$ip_add = getenv("REMOTE_ADDR");
		

	if($count == 1){
		   	
			if (isset($_COOKIE["product_list"])) {
				$p_list = stripcslashes($_COOKIE["product_list"]);
				$product_list = json_decode($p_list,true);
				for ($i=0; $i < count($product_list); $i++) { 
					$verify_user = "SELECT id FROM utenti WHERE Id = ".$product_list[$i];
					$result  = mysqli_query($con,$verify_user);
					if(mysqli_num_rows($result) < 1){
						$update_user = "UPDATE utenti SET Id = '$_SESSION[uid]' WHERE Id = -1";
						mysqli_query($con,$update_user);
					}else{
						$delete_existing_user = "DELETE FROM utenti WHERE Id = -1 AND p_id = ".$product_list[$i];
						mysqli_query($con,$delete_existing_user);
					}
				}
				setcookie("product_list","",strtotime("-1 day"),"/");
				echo "cart_login";
				
				
				exit();
				
			}
			echo "login_success";
			$BackToMyPage = $_SERVER['HTTP_REFERER'];
				if(!isset($BackToMyPage)) {
					header('Location: '.$BackToMyPage);
					echo"<script type='text/javascript'>
					
					</script>";
				} else {
					exit();
					header('Location: index.php'); // default page
				} 
				
			
            exit();

		}else{
                $email = mysqli_real_escape_string($con,$_POST["email"]);
                $password =md5($_POST["password"]) ;
                $sql = "SELECT * FROM utenti WHERE email = '$email' AND password = '$password'";
                $run_query = mysqli_query($con,$sql);
                $count = mysqli_num_rows($run_query);

            if($count == 1){
                $row = mysqli_fetch_array($run_query);
                $_SESSION["uid"] = $row["Id"];
                $_SESSION["name"] = $row["Nome"];
                $ip_add = getenv("REMOTE_ADDR");
				
				
                    echo "login_success";

                    echo "<script> location.href='admin/addproduct.php'; </script>";
                    exit();

                }else{
                    echo "<span style='color:red;'>Registrati prima di accedere...</span>";
                    exit();
                }
    
	
}
    
	
}

?>