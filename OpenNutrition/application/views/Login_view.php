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
</style>

<main class="mdl-layout__content">
    <div class="page-content">

        <div class="outer-div">
            <div class="formulaire">
                <h1 class="h1-text">Connexion</h1>
                <?php echo validation_errors();
                ?>

                <form method="post" action="<?php echo base_url('index.php/Connexion/seConnecter'); ?>">

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="i-identifiant" required name="i-identifiant" >
                        <label class="mdl-textfield__label" for="i-identifiant">Identifiant</label>
                    </div>
                    <br/>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="i-mdp" required name="i-mdp" >
                        <label class="mdl-textfield__label" for="i-mdp">Mot de passe</label>
                    </div>
                    <br/>


                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="i-type-utilisateur">
                        <input type="radio" id="i-type-utilisateur" class="mdl-radio__button" name="type-user" value="utilisateur" checked>
                        <span class="mdl-radio__label">Utilisateur</span>
                    </label>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect radio-type-plat" for="i-type-administrateur">
                        <input type="radio" id="i-type-administrateur" class="mdl-radio__button" name="type-user" value="administrateur">
                        <span class="mdl-radio__label">Administrateur</span>
                    </label>
                    <br/><br/>
                    <input type="submit" name="submitValider" id="submitValider" value="Valider" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent btn-submit">
                </form>

            </div>
        </div>
    </div>
</main>