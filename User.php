<?php 

/**
 * 
 */
class User
{
	public $userName;
	public $loanDocuments; 
	
	function __construct(string $userName)
	{
		global $mhc;
		$this->userName = $userName;
		$this->loanDocuments = $this->loanDocuments();
	}

	public function loanDocuments() {
		global $mhc;
		$loanDocuments = $mhc->userDocument->findOne(['username' => $this->userName], ['projection' => ['loan' => 1]]);
		if (isset($loanDocuments->loan)) {
			$loanDocuments = $loanDocuments->loan;
		}else{
			$loanDocuments = false;
		}

		return $loanDocuments;
	}

	public function addLoan($idDocument) {
		global $mhc;

		$result = $mhc->addLoan($this->userName, $idDocument);

		return $result;
	}

	public function unLoan($idDocument) {
		global $mhc;

		$result = $mhc->unLoan($this->userName, $idDocument);

		return $result;
	}

}

 ?>