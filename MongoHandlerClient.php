<?php 

/**
 * MongoHandler using MongoClient()
 */
class MongoHandlerClient
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


	 /**
   * @var MongoDB\Client
   */
	public $db;

	function __construct($dbName) {
		$this->db = (new MongoDB\Client)->$dbName;
	}

	public function newUserCollection(string $dbName, string $collectionName = 'usersGroupeB') {
		
		$collections = $db->listCollections();
		$db_user_not_exists = true;

		foreach ($collections as $c) {
			if($c['name'] == $collectionName) {
				$db_user_not_exists = false;
				break;
			}
		}

		if($db_user_not_exists == true) {
			$result = $db->createCollection($collectionName, [
			'validator' => [
				'username' => ['type' => 'string'], 
				'password' => ['type' => 'string'], 
				'loan' => ['type' => 'array']
				]	
			]);
		}
	}

	public function newUser($userName, $password) {
		
	}
}


?>