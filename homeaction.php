<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["categoryhome"])){
	$category_query = "SELECT * FROM Prodotto ";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		
            
            
				<!-- responsive-nav -->
				<div id='responsive-nav'>
					<!-- NAV -->
					<ul class='main-nav nav navbar-nav'>
					<li class='active'><a href='index.php'>Home</a></li>
					<li><a href='store.php'>All</a></li>
					<li class='categoryhome' cid='Elettronica'><a href='store.php'>Elettronica</a></li>
					<li class='categoryhome' cid='Abbigliamento'><a href='store.php'>Abbigliamento</a></li>
					<li class='categoryhome' cid='Casa'><a href='store.php'>Casa</a></li>
					<li class='categoryhome' cid='Sport'><a href='store.php'>Sport</a></li>
					<li class='categoryhome' cid='Giardinaggio'><a href='store.php'>Giardinaggio</a></li>
					<li class='categoryhome' cid='Auto e Moto'><a href='store.php'>Auto e Moto</a></li>
					<li class='categoryhome' cid='Giocattoli'><a href='store.php'>Giocattoli</a></li>
	            </ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
               
			";
	
}


if(isset($_POST["page"])){
	$sql = "SELECT * FROM Prodotto";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/2);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page'>$i</a></li>
            
            
		";
	}
}
if(isset($_POST["getProducthome"])){
	$limit = 3;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM Prodotto LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['Codice_prodotto'];
			$pro_cat   = $row['tipo'];
			$pro_title = $row['Nome_prodotto'];
			$pro_price = $row['costo'];
			$pro_image = $row['immagine'];
            $mode = $row['Modalità'];
            $cat_name = $row["tipo"];
			echo "
				
                       <div class='product-widget'>
                                <a href='product.php?p=$pro_id'> 
									<div class='product-img'>
										<img src='product_images/$pro_image' alt=''>
									</div>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										"; 
										if($pro_price != 0){
											echo "<h4 class='product-price header-cart-item-info'> € $pro_price  </h4>";
										}else{
											echo "<h4 class='product-price header-cart-item-info'> $mode  </h4>";
										}
										echo "
									</div></a>
								</div>
                        
			";
		}
	}
}


if(isset($_POST["gethomeProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
    
	$product_query = "SELECT * FROM Prodotto WHERE Codice_prodotto BETWEEN 1 AND 20";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
        
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['Codice_prodotto'];
			$pro_cat   = $row['tipo'];
			$pro_title = $row['Nome_prodotto'];
			$pro_price = $row['costo'];
			$pro_image = $row['immagine'];
            $mode = $row['Modalità'];
            $cat_name = $row["tipo"];
            
			echo "
				
                        
                                <div class='col-md-3 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										"; 
										if($pro_price != 0){
											echo "<h4 class='product-price header-cart-item-info'> € $pro_price  </h4>";
										}else{
											echo "<h4 class='product-price header-cart-item-info'> $mode  </h4>";
										}
										echo "
										
										
								
								</div>
                                </div>
							
                        
			";
		}
        ;
      
}
    
	}
    
if(isset($_POST["get_seleted_Category"]) ||  isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["tipo"];
		$sql = "SELECT * FROM Prodotto WHERE tipo = '$id' ";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM Prodotto WHERE  Nome LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['Codice_prodotto'];
			$pro_cat   = $row['tipo'];
			$pro_title = $row['Nome_prodotto'];
			$pro_price = $row['costo'];
			$pro_image = $row['immagine'];
			$cat_name = $row["tipo"];
			$mode = $row['Modalità'];
			echo "
					
                        
                        <div class='col-md-4 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										"; 
										if($pro_price != 0){
											echo "<h4 class='product-price header-cart-item-info'> € $pro_price  </h4>";
										}else{
											echo "<h4 class='product-price header-cart-item-info'> $mode  </h4>";
										}
										echo "
										
										
									</div>
									
								</div>
							</div>
			";
		}
	}