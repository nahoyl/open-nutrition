<!DOCTYPE html>
<meta charset="utf-8" />
<html>
    <head>
        <title> Création de base </title>
    </head>
<body>
	<form method="post" action="index.php?controller=produit&action=created">
  		<fieldset>
    		<legend>Ce que vous voulez rajouter au site</legend>
    			<p>
      				<label for="intitule_id">Intitulé</label> :
      				<input type="text" placeholder="Ex : Argent" name="intitule" id="intitule_id" required/>
    			</p>
    			<p>
      				<input type="submit" value="Envoyer" />
    			</p>
  		</fieldset>
	</form>
</body>
</html>
