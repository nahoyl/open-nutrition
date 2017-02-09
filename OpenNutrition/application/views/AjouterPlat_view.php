<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//var_dump($PlatCrous);
?>

<style>

  .outer-div {
    padding: 2em;
    text-align: center;
  }

  .formulaire{
    margin: auto;
  }

  .btn-submit{
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
  .h1-text{
    font-size: 30px;
  }
  .radio-type-plat{
    margin-left: 5px;
    margin-right: 5px;
  }
</style>
<main class="mdl-layout__content">
  <section class="mdl-layout__tab-panel is-active" id="fixed-tab-ajout">
    <div class="page-content">
      <!-- Contenu tab Ajouter -->

      <div class="outer-div">
        <div class="formulaire">
          <h1 class="h1-text">Ajouter un plat</h1>

          <form action="{$base_url}controleur/FormulaireAjout">

            <!-- Input texte avec label -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="nomPlat">
              <label class="mdl-textfield__label" for="nomPlat">Nom</label>
            </div>
            <br/>

            <!-- Input nombre avec label et texte d'erreur -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="prixPlat">
              <label class="mdl-textfield__label" for="prixPlat">Prix</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <br/>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="noteCO2">
              <label class="mdl-textfield__label" for="noteCO2">Emission CO2</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <br/>

           <!-- Choix unique de la note 5C -->
            <h5>Note 5C</h5>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="option-A">
              <input type="radio" id="option-A" class="mdl-radio__button" name="options-note" value="A">
              <span class="mdl-radio__label">A</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="option-B">
              <input type="radio" id="option-B" class="mdl-radio__button" name="options-note" value="B">
              <span class="mdl-radio__label">B</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="option-C">
              <input type="radio" id="option-C" class="mdl-radio__button" name="options-note" value="C">
              <span class="mdl-radio__label">C</span>
            </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="option-D">
              <input type="radio" id="option-D" class="mdl-radio__button" name="options-note" value="D">
              <span class="mdl-radio__label">D</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="option-E">
              <input type="radio" id="option-E" class="mdl-radio__button" name="options-note" value="E">
              <span class="mdl-radio__label">E</span>
            </label>

            <!-- Choix unique du type du plat -->
            <h5>Type du plat</h5>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="option-1">
              <input type="radio" id="option-1" class="mdl-radio__button" name="options-type" value="plat" checked>
              <span class="mdl-radio__label">Plat</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="option-2">
              <input type="radio" id="option-2" class="mdl-radio__button" name="options-type" value="entree">
              <span class="mdl-radio__label">Entrée</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="option-3">
              <input type="radio" id="option-3" class="mdl-radio__button" name="options-type" value="dessert">
              <span class="mdl-radio__label">Dessert</span>
            </label>
            <br/>

            <!-- Liste des choix de composition -->
            <style>
            .demo-list-control {
              width: 300px;
            }

            .demo-list-radio {
              display: inline;
            }
            </style>

            <h5>Composition</h5>
            <ul class="demo-list-control mdl-list">
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Viande, poisson et oeuf
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-1">
                    <input type="checkbox" id="list-checkbox-1" class="mdl-checkbox__input"/>
                  </label>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Féculent
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-2">
                    <input type="checkbox" id="list-checkbox-2" class="mdl-checkbox__input"/>
                  </label>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Légume ou Fruit
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-3">
                    <input type="checkbox" id="list-checkbox-3" class="mdl-checkbox__input"/>
                  </label>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Produit laitier
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-4">
                    <input type="checkbox" id="list-checkbox-4" class="mdl-checkbox__input"/>
                  </label>
                </span>
              </li>
            </ul>

            <input type="submit" name="submit" id="submit" value="Ajouter" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent btn-submit">
          </form>
        </div>
      </div>
    </div>
  </section>
  <section class="mdl-layout__tab-panel" id="fixed-tab-suppr">
    <div class="page-content">
      <!-- Contenu tab supprimer -->
      <div class="outer-div">
        <div class="formulaire">
          <h1 class="h1-text">Supprimer un plat</h1>

          <!-- Deletable Chip -->
          <ul class="demo-list-control mdl-list">
            
              <?php
              $nbDessert = 7;
              foreach ($DessertCrous as $plat) {
                  $nomPlat = str_replace(' ', '', $plat->nomPlat);
                  ?>


                  <li class="mdl-list__item mdl-list__item--two-line" id="<?php echo $nomPlat; ?>">
                      <span class="mdl-list__item-primary-content">
                          <p class ="note note<?php echo $plat->note5C; ?>"><?php echo $plat->note5C; ?></p>
                          <span class='nomplat'><?php echo $plat->nomPlat; ?> </span>
                          <span class="mdl-list__item-sub-title"><?php echo $plat->prixPlat; ?>€</span>
                      </span>

                      <span class="mdl-list__item-secondary-action">
                          <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="list-option3-<?php echo $nbDessert; ?>">
                              <input type="radio" id="list-option3-<?php echo $nbDessert; ?>" class="mdl-radio__button" name="<?php echo $plat->typePlat; ?>" value="<?php echo $nomPlat; ?>" />
                          </label>
                      </span>
                  </li>
                  <?php
                  $nbDessert ++;
              }
              ?>

          </ul>

        </div>
      </div>
    </div>
  </section>
</main>



