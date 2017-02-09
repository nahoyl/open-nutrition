<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//var_dump($PlatCrous);
?>

<style>

  .outer-div {
    padding: 3em;
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
</style>
<main class="mdl-layout__content">
  <section class="mdl-layout__tab-panel is-active" id="fixed-tab-ajout">
    <div class="page-content"><!-- Your content goes here -->

<div class="outer-div">
<div class="formulaire">
<h1 class="h1-text">Ajouter un plat</h1>

<!-- Input avec label -->

<form action="{$base_url}controleur/FormulaireAjout">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="nomPlat">
    <label class="mdl-textfield__label" for="nomPlat">Nom</label>
  </div>
  <br/>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="prixPlat">
    <label class="mdl-textfield__label" for="prixPlat">Prix</label>
  </div>
 <br/>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="typePlat">
    <label class="mdl-textfield__label" for="typePlat">Type de plat</label>
  </div>
 <br/>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="note5C">
    <label class="mdl-textfield__label" for="note5C">Note 5C</label>
  </div>
 <br/>
   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="noteCO2">
    <label class="mdl-textfield__label" for="noteCO2">Note CO2</label>
  </div>
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
      Légume et Fruit
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
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-suppr">
      <div class="page-content"><!-- Your content goes here --></div>
    </section>
</main>



