<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM Prodotto";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		
            
            <div class='aside'>
							<h3 class='aside-title'>Categorie</h3>
							<div class='btn-group-vertical'>
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$cid = $row["tipo"];
            $sql = "SELECT COUNT(*) AS count_items FROM Prodotto WHERE tipo=$cid";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
            
            
			echo "
					
                    <div type='button' class='btn navbar-btn category' tipo='$cid'>
									
									<a href='#'>
										<span  ></span>
										$cat_name
										<small class='qty'>($count)</small>
									</a>
								</div>
                    
			";
            
		}
        
        
		echo "</div>";
	}
}
if(isset($_POST["page"])){
	$sql = "SELECT * FROM Prodotto";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page' class='active'>$i</a></li>
            
            
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM Prodotto  LIMIT $start,$limit";
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
				
                        
                        <div class='col-md-4 col-xs-6' >
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
							</div>
                        
			";
		}
	}
}


if(isset($_POST["get_seleted_Category"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$pro_cat   = $row['tipo'];
		$sql = "SELECT * FROM Prodotto WHERE tipo = '$pro_cat' ";
        
	}else {
        
		$tipo = $_POST["tipo"];
        header('Location:store.php');
		$sql = "SELECT * FROM Prodotto ";
       
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['Codice_prodotto'];
			$pro_cat   = $row['tipo'];
			$mode = $row['Modalità'];
			$pro_title = $row['Nome_prodotto'];
			$pro_price = $row['costo'];
			$pro_image = $row['immagine'];
            $cat_name = $row["tipo"];
			echo "
					
                        
                        <div class='col-md-4 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='product_images/$pro_image'  style='max-height: 170px;' alt=''>
										
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
	}
?>






