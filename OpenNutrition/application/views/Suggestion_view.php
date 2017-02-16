<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$nbPlat = 3;

?>

<!--
<style>


    .mdl-radio__ripple-container {
        position: absolute;
        z-index: 2;
        top: -9px;
        left: -13px;
        box-sizing: border-box;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        cursor: pointer;
        overflow: hidden;
        -webkit-mask-image: -webkit-radial-gradient(circle,#fff,#000);
    }
    .mdl-radio {
        font-size: 16px;
        line-height: 24px;
    }
    a, .mdl-accordion, .mdl-button, .mdl-card, .mdl-checkbox, .mdl-dropdown-menu, .mdl-icon-toggle, .mdl-item, .mdl-radio, .mdl-slider, .mdl-switch, .mdl-tabs__tab {
    -webkit-tap-highlight-color: transparent;
    -webkit-tap-highlight-color: rgba(255,255,255,0);
}
.mdl-list__item {
    font-family: "Roboto","Helvetica","Arial",sans-serif;
    font-weight: 400;
    letter-spacing: .04em;
    min-height: 48px;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    padding: 16px;
    color: rgba(0,0,0,.87);
    overflow: hidden;
}
li {
    display: list-item;
    text-align: -webkit-match-parent;
}



</style>-->
<!--<ul class="demo-list-control mdl-list listePlat">-->

<?php
foreach ($suggestion as $uneSuggestion) {
    $nomPlat = str_replace(' ', '', $uneSuggestion->nomPlat);
    $nbPlat++;
    ?>

    <li class="mdl-list__item mdl-list__item--two-line" id="<?php echo $nomPlat; ?>">
        <span class="mdl-list__item-primary-content">
            <p class ="note note<?php echo $uneSuggestion->note5C; ?>"><?php echo $uneSuggestion->note5C; ?></p>

            <span class='nomplat'><?php echo $uneSuggestion->nomPlat; ?></span>
            <span class="mdl-list__item-sub-title"><?php echo $uneSuggestion->prixPlat; ?>€</span>
        </span>

        <span class="mdl-list__item-secondary-action">
            <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="list-option2<?php echo $uneSuggestion->typePlat; ?>-<?php echo $nbPlat; ?>">
                <input type="radio" id="list-option2<?php echo $uneSuggestion->typePlat; ?>-<?php echo $nbPlat; ?>" class="mdl-radio__button <?php echo $uneSuggestion->typePlat; ?>" name="<?php echo $uneSuggestion->typePlat; ?>" value="<?php echo $nomPlat; ?>" />
            </label>
        </span>
    </li>
    <?php
}
?>

<!--</ul>-->