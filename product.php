<?php
include "header.php";
?>
		<!-- /BREADCRUMB -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
		<script>
    
    (function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
		
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            e.stopPropagation();
        };		
    };
})(window);
</script>
		
		<!-- SECTION -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					
					<?php 
								include 'db.php';
								$Codice_prodotto = $_GET['p'];
								
								$sql = " SELECT * FROM Prodotto ";
								$sql = " SELECT * FROM Prodotto, utenti WHERE Codice_prodotto = $Codice_prodotto AND id_utente = Id";
								if (!$con) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($con, $sql);
								if (mysqli_num_rows($result) > 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
									echo '
									
                                    
                                
                                <div class="col-md-5 ">
                                    <div class="product-preview">
                                        <img src="product_images/'.$row['immagine'].'">
                                    </div>

                                
                                </div>
                                
                                

                                 
									';
                                    
									?>
									
									<?php 
									echo '
									
                                    
                                   
                    <div class="col-md-4">
						<div class="product-details">
							<h2 class="product-name">'.$row['Nome_prodotto'].'</h2>
							<div>';
							if($row['costo'] != 0){
								echo '<h3 class="product-price">€'.$row['costo'].'</h3>';
							}else{
								echo '<h3 class="product-price">'.$row['Modalità'].'</h3>';
							}
							echo '
							</div>
							<div>
								<h3 class="product-description">'.$row['descrizione'].'</h3>
							</div>
							
							<div class="product-options">
								<label>
									Disponibile : 
									<h3 class="product-disponibility">'.$row['disponibilità'].'</h3>
									
								</label>
								<label>
									Condizione: 
									<h3 class="product-condiction">'.$row['condizioni'].'</h3>
									
								</label>
							</div>

							
								
								
								
							

							<ul class="product-links">
								<li>Categoria:</li>
								<li><a href="#"><h3 class="product-category">'.$row['tipo'].'</h3></a></li>
							</ul>


						</div>
					</div>
									
					
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					
					
					
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Descrizione</a></li>
								<li><a data-toggle="tab" href="#tab2">Venditore</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
										<h3 class="product-category">'.$row['descrizione'].'</h3>
										</div>
									</div>
								</div>
								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
										<li><h3 class="product-category">Venditore: '.$row['Nome'].' '.$row['Cognome'].' </h3></li>
										<li><h3 class="product-category">Email: '.$row['email'].' </h3></li>
										<li><h3 class="product-category">Telefono: '.$row['telefono'].'</h3></li>
										</div>
									</div>
								</div>
							</div>
								
								
							</div>	
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    
					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Prodotti che potrebbero interessare</h3>
							
						</div>
					</div>
                    ';
									$_SESSION['Codice_prodotto'] = $row['Codice_prodotto'];
									}
								} 
								?>	
								<?php
                    include 'db.php';
								$Codice_prodotto = $_GET['p'];
                    
					$product_query = "SELECT * FROM Prodotto WHERE  Codice_prodotto BETWEEN $Codice_prodotto +1 AND $Codice_prodotto+4 ";
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
										<h4 class='product-price header-cart-item-info'> "; 
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
        ;
      
}
?>
					<!-- product -->
					
					<!-- /product -->

				</div>
				<!-- /row -->
                
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->



		<!-- FOOTER -->
<?php
include "footer.php";

?>
