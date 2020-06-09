<div class="wait overlay">
        <div class="loader"></div>
    </div>
    <style>
    .input-borders{
        border-radius:30px;
    }
    </style>
				<!-- row -->
				
                <div class="container-fluid">
					
						
						
						<!-- /Billing Details -->
						
								<form id="signup_form" onsubmit="return false" class="login100-form">
									<div class="billing-details jumbotron">
                                    <div class="section-title">
                                        <h2 class="login100-form-title p-b-49" >Registra Prodotto</h2>
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">Modalità</label>
                                        <select class="form-control" name="modalità" id="modalità">
                                        <option>Vendo</option>
                                         <option>Compro</option>
                                         <option>Scambio</option>
                                         <option>Regalo</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                    
                                        <input class="input form-control input-borders" type="text" name="nome" id="nome" placeholder="Nome Prodotto">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">Categoria</label>
                                        <select class="form-control" name="tipo" id="tipo">
                                        <option>Elettronica</option>
                                         <option>Abbigliamento</option>
                                         <option>Casa</option>
                                         <option>Sport</option>
                                         <option>Giardinaggio</option>
                                         <option>Auto e Moto</option>
                                         <option>Giocattoli</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">Condizioni</label>
                                        <select class="form-control" name="condizioni" id="condizioni">
                                        <option>Nuovo</option>
                                         <option>Come_nuovo</option>
                                         <option>Usato</option>
                                         <option>Danneggiato</option>
                                         <option>Ricondizionato</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">Disponibilità</label>
                                        <select class="form-control" name="disponibilità" id="disponibilità">
                                        <option>Si</option>
                                         <option>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="data" name="descrizione" id="descrizione" placeholder="Descrizione">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="number" name="costo" id="costo" placeholder="Costo">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="immagine" required>
                                        <label class="custom-file-label" for="validatedCustomFile">Inserisci Immagine...</label>
                                        <div class="invalid-feedback">Scegliere immagine</div>
                                    </div>
                                    
                                    
                                    
                                    <div style="form-group">
                                       <input class="primary-btn btn-block"  value="Registrati" type="submit" name="signup_button">
                                    </div>
                                    
                                    
                                
								</form>
                                <div class="login-marg">
						<!-- Billing Details -->
						<div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" id="signup_msg">
                                    

                                </div>
                                <!--Alert from signup form-->
                            </div>
                            <div class="col-md-2"></div>
                        </div>

						
					</div>
                    </div> 

					
				
				<!-- /row -->

			
