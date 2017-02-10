<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
          
          <form method="post" action="<?php echo base_url('index.php/Formulaire/submitAjout');?>">

            <!-- Input texte avec label -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="i-nomPlat" name="i-nomPlat">
              <label class="mdl-textfield__label" for="i-nomPlat">Nom</label>
            </div>
            <br/>

            <!-- Input nombre avec label et texte d'erreur -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-prixPlat" name="i-prixPlat">
              <label class="mdl-textfield__label" for="i-prixPlat">Prix</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <br/>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-noteCO2" name="i-noteCO2">
              <label class="mdl-textfield__label" for="i-noteCO2">Emission CO2</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <br/>

            <h5>Note 5C</h5>

            <!-- Champs à remplir pour la note 5C -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="i-de" name="i-de">
              <label class="mdl-textfield__label" for="i-de">Densité énergétique (KJ/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-gs" name="i-gs">
              <label class="mdl-textfield__label" for="i-gs">Graisses saturées (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="i-ss" name="i-ss">
              <label class="mdl-textfield__label" for="i-ss">Sucres simples (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="i-s" name="i-s">
              <label class="mdl-textfield__label" for="i-s">Sodium (mg/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="i-fln" name="i-fln">
              <label class="mdl-textfield__label" for="i-fln">Fruits, Légumes et noix (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="i-f" name="i-f">
              <label class="mdl-textfield__label" for="i-f">Fibres (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="i-p" name="i-p">
              <label class="mdl-textfield__label" for="i-p">Protéines (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>

            <!-- Choix unique du type du plat -->
            <h5>Type du plat</h5>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="i-type-plat">
              <input type="radio" id="i-type-plat" class="mdl-radio__button" name="options-type" value="Plat" checked>
              <span class="mdl-radio__label">Plat</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="i-type-entree">
              <input type="radio" id="i-type-entree" class="mdl-radio__button" name="options-type" value="Entree">
              <span class="mdl-radio__label">Entrée</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="i-type-dessert">
              <input type="radio" id="i-type-dessert" class="mdl-radio__button" name="options-type" value="Dessert">
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
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="i-viandes">
                    <input type="checkbox" id="i-viandes" class="mdl-checkbox__input" name="tab-composition[]" value="viandes"/>
                  </label>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Féculent
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="i-feculent">
                    <input type="checkbox" id="i-feculent" class="mdl-checkbox__input" name="tab-composition[]" value="feculent"/>
                  </label>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Légume ou Fruit
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="i-fruitlegume">
                    <input type="checkbox" id="i-fruitlegume" class="mdl-checkbox__input" name="tab-composition[]" value="fruitlegume"/>
                  </label>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Produit laitier
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="i-laitier">
                    <input type="checkbox" id="i-laitier" class="mdl-checkbox__input" name="tab-composition[]" value="laitier"/>
                  </label>
                </span>
              </li>
            </ul>

            <input type="submit" name="submitAjout" id="submitAjout" value="Ajouter" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent btn-submit">
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
          <form method="post" action="<?php echo base_url('index.php/Formulaire/submitSuppr');?>">
          <h1 class="h1-text">Supprimer un plat</h1>

            <!-- Liste des plats avec radio bouton-->
            <ul class="demo-list-control mdl-list">

                <?php
                $idGenerator = 0;
                foreach ($PlatCrous as $plat) {
                    $nomPlat = str_replace(' ', '', $plat->nomPlat);
                    ?>

                    <li class="mdl-list__item" id="<?php echo $nomPlat; ?>">
                        <span class="mdl-list__item-primary-content">
                            <?php echo $plat->nomPlat; ?>
                        </span>

                        <span class="mdl-list__item-secondary-action">
                            <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="list-option-suppr-<?php echo $idGenerator; ?>">
                                <input type="radio" id="list-option-suppr-<?php echo $idGenerator; ?>" class="mdl-radio__button" name="suppression" value="<?php echo $nomPlat; ?>" />
                            </label>
                        </span>
                    </li>
                    <?php
                    $idGenerator ++;
                }
                ?>

            </ul>

            <input type="submit" name="submitSuppr" id="submitSuppr" value="Supprimer" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent btn-submit">
          </form>
        </div>
      </div>
    </div>
  </section>
</main>



