<?php
require_once ("{$ROOT}{$DS}config{$DS}Conf.php");
class Model
	{
	public static $pdo;
	
	private $host;
	private $bdname;
	private $login;
	private $pass;
	
	public static function Init()
		{
		$host = Conf::getHostName();
		$bdname = Conf::getDatabase();
		$login = Conf::getLogin();
		$pass = Conf::getPassword();
		try
			{
			self::$pdo = new PDO("mysql:host=$host;dbname=$bdname", $login, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		catch(PDOException $e) 
			{
			echo $e->getMessage();
			die();
			}
		}
	}
Model::Init()
?>
