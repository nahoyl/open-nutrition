<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$ingr = "";

foreach ($ingredient as $key => $value) {
    $ingr .=" " . $value->nomIngredient . " ( " . $value->quantite . " )";
    if (count($ingredient) != $key + 1) {
        $ingr .=",";
    }
}
$ingr .= ".";
?>


<!--<button id="show-dialog" type="button" class="mdl-button">Show Dialog</button>-->





    <h3 class="mdl-dialog__title"><?php echo $notePlat; ?> <?php echo $nomPlat; ?> : </h3>
    <div class="mdl-dialog__content">
        <span> Ingredients : </span>
        <p>
            <?php echo $ingr; ?>
        </p>
        
        <span> Alleregene : </span>
        <p>
            <?php echo $ingr; ?>
        </p>
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button close">Close</button>
    </div>


