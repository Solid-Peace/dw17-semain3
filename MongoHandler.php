<?php 

/**
 * 	classe regroupant les interactions avec la bdd mongo
 */
class MongoHandler
{

	public $dbName;
	public $mng;
	
	function __construct(string $dbName)
	{
		$this->dbName = $dbName;
		$this->mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	}


	public function initQuery(array $filter = [], array $options = []): MongoDB\Driver\Query 
	{
		return new MongoDB\Driver\Query($filter, $options);
	}


	public function executeQuery(MongoDB\Driver\Query $query): MongoDB\Driver\Cursor 
	{

		return $this->mng->executeQuery($this->dbName, $query);
	}


	public function displayTitleDocuments(): MongoDB\Driver\Cursor
	{
		$filter = ["'fields'" => ["'titre_avec_lien_vers_le_catalogue'" => "'Etranges rivages'"]];
		$options = [];

		return $this->executeQuery($this->initQuery($filter, $options));
	}


	public function displayRangTitles(): MongoDB\Driver\Cursor
	{
		$filter = ["fields" => ["rang" => ['$gte' => 1, '$lte' => 10]]];
		$options = [
			"titre_avec_lien_vers_le_catalogue" => 1,
			"rang" => 1,
			"_id" => 0];

		return $this->executeQuery($this->initQuery($filter, $options));
	}


	public function displayAuteurN(): MongoDB\Driver\Cursor
	{
		$filter = ["fields" => ["titre_avec_lien_vers_le_catalogue" => "/^'N'/"]];
		$options = [
			"titre_avec_lien_vers_le_catalogue" => 1,
			"auteur" => 1,
			"_id" => 0];

		return $this->executeQuery($this->initQuery($filter, $options));
	}


}

?>