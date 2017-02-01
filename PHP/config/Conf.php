<?php
class Conf 
	{
	static private $databases = array('hostname' => 'infolimon', 'database' => 'lauransg', 'login' => 'lauransg', 'password' => '1111016921N');
   
	static public function getHostName() 
		{
		return self::$databases['hostname'];
		}
	
	static public function getDatabase() 
		{
		return self::$databases['database'];
		}
		
	static public function getLogin() 
		{
		return self::$databases['login'];
		}
		
	static public function getPassword() 
		{
		return self::$databases['password'];
		}
	}
?>