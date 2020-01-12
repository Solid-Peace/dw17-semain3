<?php 

/**
 * 	classe regroupant les interactions avec la bdd mongo
 */
class MongoHandler
{

	public $dbName;
	public $mng;
	
	function __construct(string $dbName, string $hostAddress = 'mongodb://localhost:27017')
	{
		$this->dbName = $dbName;
		$this->mng = new MongoDB\Driver\Manager($hostAddress);
	}


	public function initQuery(array $filter = [], array $options = []): MongoDB\Driver\Query 
	{
		return new MongoDB\Driver\Query($filter, $options);
	}


	public function executeQuery(MongoDB\Driver\Query $query): MongoDB\Driver\Cursor 
	{

		return $this->mng->executeQuery($this->dbName, $query);
	}

	public function getQuery( array $filter = [], array $options = [] ) : MongoDB\Driver\Cursor
	{

		return $this->executeQuery($this->initQuery($filter, $options));
	}
}

?>