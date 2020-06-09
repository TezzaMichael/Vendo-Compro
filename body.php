
   <div class="main main-raised">
        <div class="container mainn-raised" style="width:100%;">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
	<!-- Left and right controls -->
    <a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only" >Indietro</span>
    </a>
    <a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Avanti</span>
    </a>
  </div>
</div>
     


		<!-- SECTION -->
		<div class="section mainn mainn-raised">
		
		
			<!-- container -->
			<div class="container">
			
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-3 col-xs-6">
						<a href="product.php?p=78"><div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Vendo</h3>
								<a href="product.php?p=1" class="cta-btn">Scopri di più... <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div></a>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-3 col-xs-6">
						<a href="product.php?p=72"><div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Compro</h3>
								<a href="product.php?p=4" class="cta-btn">Scopri di più... <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div></a>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-3 col-xs-6">
						<a href="product.php?p=79"><div class="shop">
							<div class="shop-img">
								<img src="./img/regalo1.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Regalo</h3>
								<a href="product.php?p=15" class="cta-btn">Scopri di più... <i class="fa fa-arrow-circle-right"></i></a>
							</div>
                            </div></a>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-3 col-xs-6">
						<a href="product.php?p=78"><div class="shop">
							<div class="shop-img">
								<img src="./img/scambio1.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Scambio</h3>
								<a href="product.php?p=3" class="cta-btn">Scopri di più... <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div></a>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		  
		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Ultimi Arrivi</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="Prodotto-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="Prodotto-slick" data-nav="#slick-nav-1" >
									
									<?php
                    include 'db.php';
								
                    
					$product_query = "SELECT * 
					FROM `Prodotto` 
					WHERE Codice_prodotto BETWEEN (SELECT Max(Codice_prodotto)-5
												   FROM Prodotto) AND (SELECT Max(Codice_prodotto)
																		  FROM Prodotto)";
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
				
                        
                                
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
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
?>
										<!-- product -->
										
	
										<!-- /product -->
										
										
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="Prodotto-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Prezzi Bassi</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="Prodotto-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="Prodotto-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php
                    include 'db.php';
								
                    
					$product_query = "SELECT * 
					FROM `Prodotto` 
					WHERE Modalità = 'Vendo' AND costo BETWEEN (SELECT MIN(costo)
												   FROM Prodotto) AND (SELECT Min(costo)+50
																		  FROM Prodotto)";
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
				
                        
                                
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
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
?>
										
</div>
	<div id="slick-nav-2" class="Prodotto-slick-nav"></div>
</div>
<!-- /tab -->
</div>
</div>
</div>
<!-- /Products tab & slick -->
</div>
<!-- /row -->
<div class="clearfix visible-sm visible-xs">
</div>
<div class="col-md-4 col-xs-6">
<div class="Prodotto-widget-slick" data-nav="#slick-nav-5">
</div>
						</div>
					</div>

				</div>
				
			</div>
			
		</div>
		
</div>
		