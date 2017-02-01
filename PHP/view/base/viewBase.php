<?php
echo '<p> (id:'.$v->getIdentifiant().') Base qui a pour variable '.$v->getVariable().', possede une variable '.$v->getVariable().'.</p> <p> <a href = index.php?action=delete&id=' . $v->getIdentifiant() . '> Retirer la base </a>' ;
?>
