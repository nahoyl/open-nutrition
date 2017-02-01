<?php
require_once ("{$ROOT}{$DS}model{$DS}modelBase.php");

switch ($action) 
	{
    case "readAll":
    $tab_v = ModelBase::getAllBases();
    require ("{$ROOT}{$DS}view{$DS}Base{$DS}viewAllBase.php");
    break;

	case "read":
	$id = $_GET['id'];
	$v = ModelBase::getBaseById($id);
	if ($v == false)
		{
        	require ("{$ROOT}{$DS}view{$DS}Base{$DS}viewErrorBase.php");
		break;
		}
        require ("{$ROOT}{$DS}view{$DS}Base{$DS}viewBase.php");
        break;

	case "create":
        require ("{$ROOT}{$DS}view{$DS}Base{$DS}viewCreateBase.php");
	break;

	case "created":
	$variable = $_POST['variable'];
    require ("{$ROOT}{$DS}view{$DS}Base{$DS}viewCreatedBase.php");
	$tab_v = ModelBase::getAllBases();
	require ("{$ROOT}{$DS}view{$DS}Base{$DS}viewAllBase.php");
	break;

	case "delete":
	$id = $_GET['id'];
	$v = ModelBase::getBaseById($id);
	require ("{$ROOT}{$DS}view{$DS}Base{$DS}viewDeleteBase.php");
	$tab_v = ModelBase::getAllBases();
	require ("{$ROOT}{$DS}view{$DS}Base{$DS}viewAllBase.php");
	}

?>
