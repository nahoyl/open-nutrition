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
                    <h1 class="h1-text">Ajouter un utilisateur</h1>
                    <?php 
                    echo validation_errors(); 
                    ?>

                    <form method="post" action="<?php echo base_url('index.php/Utilisateur/submitAjout'); ?>">

                        <!-- Input texte avec label -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="i-nom" required  name="i-nom">
                            <label class="mdl-textfield__label" for="i-nom">Nom</label>
                        </div>
                        <br/>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" id="i-mdp1" required name="i-mdp1">
                            <label class="mdl-textfield__label" for="i-mdp1">Mot de passe</label>
                        </div>
                        <br/>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" id="i-mdp2" required name="i-mdp2">
                            <label class="mdl-textfield__label" for="i-mdp2">Confirmer le mot de passe</label>
                        </div>
                        <br/>



                        <!-- Choix unique du type du plat -->
                        <h5>Type d'utilisateur</h5>
                        <br/>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-user" for="i-type-admin">
                            <input type="radio" id="i-type-admin" class="mdl-radio__button" name="options-type" value="administrateur" checked>
                            <span class="mdl-radio__label">Administrateur</span>
                        </label>
                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-user" for="i-type-user">
                            <input type="radio" id="i-type-user" class="mdl-radio__button" name="options-type" value="utilisateur">
                            <span class="mdl-radio__label">Utilisateur</span>
                        </label>
                        <br/>
                        <br/>

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
                    <form method="post" action="<?php echo base_url('index.php/Utilisateur/submitSuppr'); ?>">
                        <h1 class="h1-text">Supprimer un utilisateur</h1>

                        <!-- Liste des plats avec radio bouton-->
                        <ul class="demo-list-control mdl-list">

                            <?php
                            $idGenerator = 0;
                            foreach ($Utilisateurs as $unUtilisateur) {
                                ?>

                                <li class="mdl-list__item" id="<?php echo $unUtilisateur->nomUser; ?>">
                                    <span class="mdl-list__item-primary-content">
                                        <?php echo $unUtilisateur->nomUser; ?>
                                    </span>

                                    <span class="mdl-list__item-secondary-action">
                                        <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="list-option-suppr-<?php echo $idGenerator; ?>">
                                            <input type="radio" id="list-option-suppr-<?php echo $idGenerator; ?>" class="mdl-radio__button" name="suppression" value="<?php echo $unUtilisateur->nomUser; ?>" />
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



