<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des Bases</title>
    </head>

    <body>
        <?php
        foreach ($tab_v as $v)
          echo '<p> Base avec variable <a href = index.php?action=read&id='. $v->getIdentifiant() . '>' . $v->getIntitule() .'</a> .   <a href = index.php?action=delete&id=' . $v->getIdentifiant() . '> x </a></p>';
        ?>
    </body>
</html>

