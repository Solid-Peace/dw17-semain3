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
	public $userCollectionName;

	 /**
   * @var MongoDB\Collection
   */
	public $collection;

	 /**
   * @var MongoDB\Client
   */
	public $db;

	function __construct($dbName, $userCollectionName = 'usersGroupeB') {
		$this->userCollectionName = $userCollectionName;
		$this->dbName = $dbName;
		$this->db = (new MongoDB\Client)->$dbName;
	}

	public function newUserCollection(): string {
		
		$collections = $this->db->listCollections();
		$db_user_not_exists = true;
		$userCollectionName = $this->userCollectionName;

		foreach ($collections as $c) {
			if($c['name'] == $this->userCollectionName) {
				$db_user_not_exists = false;
				break;
			}
		}

		if($db_user_not_exists == true) {
			$result = $this->db->createCollection($userCollectionName, [
			'validator' => [
				'username' => ['type' => 'string'], 
				'password' => ['type' => 'string'], 
				'loan' => ['type' => 'array']
				]	
			]);
		}

		return $db_user_not_exists;
	}

	public function newUser($userName, $password) {
		// vérifie qu'aucun utilisateur ne possède le même nom : 
		$user_not_exists = true;
		$userCollectionName = $this->userCollectionName;
		$collection = $this->db->userCollectionName;

		if($collection->find(['username' => $userName])) {
			$user_not_exists = "l'utilisateur existe et n'a pas été créé";
		}else{
			$collection->insert([
				'username' => $userName, 
				'password' => $password,
				'loan' => []
			]);
		}

		return $user_not_exists;
	}
}


?>