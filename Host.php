<?php 
/**
 * Classe interfacant l'host du site avec les autres classes. Nottament MongoHandler
 */
class Host
{

	 /**
   * @var string
   */
	 public $dbName;

	 /**
   * @var string
   */
	 public $mediaCollectionName;

	/**
   * @var string
   */
	public $userCollectionName;

	/**
   * @var string
   */
	public $hostAddress;

	public $mh;

	public $mhc;


	function __construct(string $dbName, string $mediaCollectionName, string $userCollectionName, string $hostAddress = 'mongodb://localhost:27017')
	{
		$this->dbName = $dbName;
		$this->mediaCollectionName = $mediaCollectionName;
		$this->userCollectionName = $userCollectionName;
		$this->hostAddress = $hostAddress;
		$this->mh = new MongoHandler($this->dbName.'.'.$this->mediaCollectionName);
		$this->mhc = new MongoHandlerClient($this->dbName, $this->userCollectionName);
	}

	public function connexion() {
				$_SESSION['dbName'] = $this->dbName;
				$_SESSION['mediaCollectionName'] = $this->mediaCollectionName;
				$_SESSION['userCollectionName'] = $this->userCollectionName;
				$_SESSION['hostAddress'] = $this->hostAddress;
				$_SESSION['session_start'] = true;
				header('Location: index.php');
	}
}



?>