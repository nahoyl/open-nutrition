<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>	  
<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Accueil</span>
    <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="<?php echo base_url('index.php/Welcome'); ?>">Accueil</a>
        <?php if (!empty($this->session->userdata("identifiant"))) { ?>
            <a class="mdl-navigation__link" href="<?php echo base_url('index.php/Formulaire'); ?>">Gerer les plats</a>
        <?php if ($this->encrypt->decode($this->session->userdata("open_nutrition")) == "administrateur") { ?>

            <a class="mdl-navigation__link" href="<?php echo base_url('index.php/Utilisateur'); ?>">Gerer les utilisateurs</a>

        <?php } ?>
        <a class="mdl-navigation__link" href="<?php echo base_url('index.php/Connexion/deco'); ?>">Deconnexion</a>

        <?php } else { ?>

            <a class="mdl-navigation__link" href="<?php echo base_url('index.php/Connexion'); ?>">Connexion</a>
        <?php } ?>
    </nav>
</div>