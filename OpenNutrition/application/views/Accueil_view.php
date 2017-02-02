<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//var_dump($PlatCrous);
?>


		  <main class="mdl-layout__content">
		  
		  
			<section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
			  <div class="page-content"><!-- Your content goes here -->

<!-- Square card -->
				

				<div class="demo-card-square mdl-card mdl-shadow--2dp">
				  <div class="mdl-card__title mdl-card--expand">
					<h2 class="mdl-card__title-text">Faites votre choix</h2>
				  </div>
				  <div class="mdl-card__supporting-text">
					<!-- List with avatar and controls -->
				

				<ul class="demo-list-control mdl-list">
                                    
                                    
                                    <?php 
                                    $nbPlat = 3;
                                    foreach ($PlatCrous as $plat   ){
                                        $nomPlat=str_replace(' ','',$plat->nomPlat);
                                        $nbPlat++;
                                        ?>
                                        
                                        <li class="mdl-list__item mdl-list__item--two-line" id="<?php echo $nomPlat;  ?>">
					<span class="mdl-list__item-primary-content">
					  <i class="material-icons  mdl-list__item-avatar">person</i>
                                          
					  <span class='nomplat'><?php echo $plat->nomPlat; ?> </span>
					  <span class="mdl-list__item-sub-title"><?php echo $plat->prixPlat; ?>€</span>
					</span>

					<span class="mdl-list__item-secondary-action">
					  <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="list-option2-<?php echo $nbPlat;  ?>">
						<input type="radio" id="list-option2-<?php echo $nbPlat; ?>" class="mdl-radio__button <?php echo $plat->typePlat ; ?>" name="<?php echo $plat->typePlat ; ?>" value="<?php echo $nomPlat;  ?>" />
					  </label>
					</span>
				  </li>
                                     <?php
                                    }
                                    
                                    ?>
				</ul>
				  </div>
				  <div class="mdl-card__actions mdl-card--border">
					<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
					  Terminer la sélection
					</a>
				  </div>
				</div>


			  </div>
			</section>
		  
		  
		  
			<section class="mdl-layout__tab-panel" id="fixed-tab-2">
			  <div class="page-content"><!-- Your content goes here -->
				

				<div class="demo-card-square mdl-card mdl-shadow--2dp">
				  <div class="mdl-card__title mdl-card--expand">
					<h2 class="mdl-card__title-text">Faites votre choix</h2>
				  </div>
				  <div class="mdl-card__supporting-text">


				<ul class="demo-list-control mdl-list">
                                    
                                    <?php 
                                    $nbEntree = 1;
                                    foreach ($EntreeCrous as $plat){
                                        $nomPlat=str_replace(' ','',$plat->nomPlat);
                                        ?>
                                    

				  <li class="mdl-list__item mdl-list__item--two-line" id="<?php echo $nomPlat;  ?>">
					<span class="mdl-list__item-primary-content">
					  <i class="material-icons  mdl-list__item-avatar">person</i>
					  <span class='nomplat'><?php echo $plat->nomPlat; ?> </span>
					  <span class="mdl-list__item-sub-title"><?php echo $plat->prixPlat; ?>€</span>
					</span>

					<span class="mdl-list__item-secondary-action">
					  <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="list-option-<?php echo $nbEntree; ?>">
						<input type="radio" id="list-option-<?php echo $nbEntree; ?>" class="mdl-radio__button <?php echo $plat->typePlat ; ?>" name="<?php echo $plat->typePlat ; ?>" value="<?php echo $nomPlat;  ?>" />
					  </label>
					</span>
				  </li>
                                  
                                   <?php
                                     $nbEntree++;
                                    }
                                    
                                    ?>
                                  
                                  

				</ul>
				  </div>
				  <div class="mdl-card__actions mdl-card--border">
					<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
					  Terminer la sélection
					</a>
				  </div>
				</div>
				
			  </div>
			</section>
			
			
			
			
			<section class="mdl-layout__tab-panel" id="fixed-tab-3">
			  <div class="page-content"><!-- Your content goes here -->

				<div class="demo-card-square mdl-card mdl-shadow--2dp">
				  <div class="mdl-card__title mdl-card--expand">
					<h2 class="mdl-card__title-text">Faites votre choix</h2>

				  </div>
				  <div class="mdl-card__supporting-text">


				<ul class="demo-list-control mdl-list">
                                                                       
                                    
                                    
                                    
                                      <?php 
                                    $nbDessert = 7;
                                    foreach ($DessertCrous as $plat){
                                        $nomPlat=str_replace(' ','',$plat->nomPlat);
                                        ?>


				  <li class="mdl-list__item mdl-list__item--two-line" id="<?php echo $nomPlat;  ?>">
					<span class="mdl-list__item-primary-content">
					  <i class="material-icons  mdl-list__item-avatar">person</i>
					  <span class='nomplat'><?php echo $plat->nomPlat; ?> </span>
					  <span class="mdl-list__item-sub-title"><?php echo $plat->prixPlat; ?>€</span>
					</span>

					<span class="mdl-list__item-secondary-action">
					  <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="list-option3-<?php echo $nbDessert; ?>">
						<input type="radio" id="list-option3-<?php echo $nbDessert; ?>" class="mdl-radio__button" name="<?php echo $plat->typePlat ; ?>" value="<?php echo $nomPlat;  ?>" />
					  </label>
					</span>
				  </li>
                                  <?php
                                     $nbDessert ++;
                                    }
                                    
                                    ?>

				</ul>
				  </div>
				  <div class="mdl-card__actions mdl-card--border">
					<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
					  Terminer la sélection
					</a>
				  </div>
				</div>

			  </div>
			</section>
		  </main>
		
		
	</body>
</html>