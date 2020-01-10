<?php 

/**
 * MongoHandler using MongoClient()
 */
class MongoHandler
{



	 /**
   * @var string
   */
	public $dbName;

	 /**
   * @var string
   */
	public $collectionName;

	 /**
   * @var MongoDB\Collection
   */
	public $collection;

	function __construct(string $dbName, string $collectionName)
	{
		$this->dbName = $dbName;
		$this->collectionName = $collectionName;
		$this->collection =  (new MongoDB\Client)->$dbName->$collectionName;
	}
}


?>