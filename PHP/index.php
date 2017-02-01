<!DOCTYPE html>
<html>
    <head>
        <title> Nom du site </title>
	<meta charset="utf-8" />
    </head>

    <body>
	<a href ="index.php"><h1> Nom du Site </h1></a>
	</p>
	<?php
	$DS = DIRECTORY_SEPARATOR;
	$ROOT = __DIR__;

	if (isset($_GET['action']) == false)
		{
		$action = "readAll";
		}
	else
		{
		$action = $_GET['action'];
		}

	if (isset($_GET['controller']) == false)
		{
		$controller = "base";
		}
	else
		{
		$controller = $_GET['controller'];
		}

	switch($controller)
		{
		case "base":
		require ("{$ROOT}{$DS}controller{$DS}controllerBase.php");
		break;
		}
	?>
    </body>
</html>

