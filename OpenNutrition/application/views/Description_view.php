<?php defined('BASEPATH') OR exit('No direct script access allowed'); 


$allerg = "";

foreach ($allergene as $key => $value) {
    $allerg .=" " . $value->nomAllergene ;
    if (count($allergene) != $key + 1) {
        $allerg .=",";
    }
}


$allerg .= ".";
?>

<dialog id="dialog" class="mdl-dialog">
<!--<dialog class="mdl-dialog" id="modal-example">-->
    <h5 class="mdl-dialog__title"><p class ="note note<?php echo $notePlat; ?>"><?php echo $notePlat; ?></p> <?php echo $nomPlat; ?> </h5>
    <div class="mdl-dialog__content">
      <h6> Allergenes :</h6>
        <p class='allergene'>
            <?php echo $allerg;?>
        </p>
        
        <h6>Gaz a effet de serre :</h6>
        <p class="co2">
            <?php echo $Co2;?>
        </p>
      
      
      
    </div>
    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
        <button type="button" class="mdl-button fermerDialog">Fermer</button>
    </div>
</dialog>








    


