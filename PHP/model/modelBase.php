<?php
require_once ("{$ROOT}{$DS}model{$DS}Model.php");
class ModelBase {

	private $variable;

	//Comment faire nos gets
	public function getVariable()
		{
		return $this->varible;
		}

  	//Comment faire nos constructeurs
  	public function __construct($v = NULL)  
		{
		if (!is_null($v)) 
			{
			$this->variable = $v;
			}
		} 

	//Comment faire nos requetes
	public function getAllBase()
		{
		$rep = Model::$pdo->query("SELECT * FROM Bases");
		$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelBase');
		$ans = $rep->fetchAll();
		return $ans;
		}
		
	function getBaseById($identifiant) 
		{
  		$sql = "SELECT * from Bases WHERE identifiant=:nom_var";
  		$req_prep = Model::$pdo->prepare($sql);
  		$values = array ("nom_var" => $identifiant,);	 
  		$req_prep->execute($values);
  		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelBase');
		return $req_prep->fetch();
		}

   function save()
	{
	$sql = "INSERT INTO Bases (variable) VALUES (:variable)";
  	$req_prep = Model::$pdo->prepare($sql);
	$values = array ("variable" => $this->variable);	 
	$req_prep->execute($values);
	}

   function delete()
	{
	$sql = "DELETE FROM Bases WHERE identifiant=:identifiant";
  	$req_prep = Model::$pdo->prepare($sql);
	$values = array ("identifiant" => $this->identifiant);	 
	$req_prep->execute($values);
	}
}
?>
