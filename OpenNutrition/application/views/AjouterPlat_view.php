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

          <form action="../index.php/Formulaire">

            <!-- Input texte avec label -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="add-nomPlat">
              <label class="mdl-textfield__label" for="add-nomPlat">Nom</label>
            </div>
            <br/>

            <!-- Input nombre avec label et texte d'erreur -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-prixPlat">
              <label class="mdl-textfield__label" for="add-prixPlat">Prix</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <br/>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-noteCO2">
              <label class="mdl-textfield__label" for="add-noteCO2">Emission CO2</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <br/>

            <h5>Note 5C</h5>
            <!-- Choix unique de la note 5C -->
            <!--
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="add-option-A">
              <input type="radio" id="add-option-A" class="mdl-radio__button" name="options-note" value="A">
              <span class="mdl-radio__label">A</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="add-option-B">
              <input type="radio" id="add-option-B" class="mdl-radio__button" name="options-note" value="B">
              <span class="mdl-radio__label">B</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="add-option-C">
              <input type="radio" id="add-option-C" class="mdl-radio__button" name="options-note" value="C">
              <span class="mdl-radio__label">C</span>
            </label>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="add-option-D">
              <input type="radio" id="add-option-D" class="mdl-radio__button" name="options-note" value="D">
              <span class="mdl-radio__label">D</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="add-option-E">
              <input type="radio" id="add-option-E" class="mdl-radio__button" name="options-note" value="E">
              <span class="mdl-radio__label">E</span>
            </label>
            -->
            <!-- Champ à remplir pour la note 5C -->
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-de">
              <label class="mdl-textfield__label" for="add-de">Densité énergétique (KJ/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-gs">
              <label class="mdl-textfield__label" for="add-gs">Graisses saturées (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-ss">
              <label class="mdl-textfield__label" for="add-ss">Sucres simples (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-s">
              <label class="mdl-textfield__label" for="add-s">Sodium (mg/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-ffn">
              <label class="mdl-textfield__label" for="add-ffn">Fruits, Légumes et noix (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-f">
              <label class="mdl-textfield__label" for="add-f">Fibres (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="add-p">
              <label class="mdl-textfield__label" for="add-p">Protéines (g/100g)</label>
              <span class="mdl-textfield__error">L'entrée n'est pas un chiffre</span>
            </div>

            <!-- Choix unique du type du plat -->
            <h5>Type du plat</h5>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="add-type-plat">
              <input type="radio" id="add-type-plat" class="mdl-radio__button" name="options-type" value="plat" checked>
              <span class="mdl-radio__label">Plat</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="add-type-entree">
              <input type="radio" id="add-type-entree" class="mdl-radio__button" name="options-type" value="entree">
              <span class="mdl-radio__label">Entrée</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="add-type-dessert">
              <input type="radio" id="add-type-dessert" class="mdl-radio__button" name="options-type" value="dessert">
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
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-viandes">
                    <input type="checkbox" id="list-checkbox-viandes" class="mdl-checkbox__input"/>
                  </label>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Féculent
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-feculent">
                    <input type="checkbox" id="list-checkbox-feculent" class="mdl-checkbox__input"/>
                  </label>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Légume ou Fruit
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-fruitlegume">
                    <input type="checkbox" id="list-checkbox-fruitlegume" class="mdl-checkbox__input"/>
                  </label>
                </span>
              </li>
              <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  Produit laitier
                </span>
                <span class="mdl-list__item-secondary-action">
                  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-laitier">
                    <input type="checkbox" id="list-checkbox-laitier" class="mdl-checkbox__input"/>
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
          <form action="{$base_url}controleur/FormulaireAjout">
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



