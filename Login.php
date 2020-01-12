<?php 

class Login {

	public $user_name;
	public $password;
	public $message;

	function __construct(string $submit, string $user_name, string $password) {

		$this->user_name = $user_name;
		$this->password = $password;
		$this->message .= $user_name . ' ' . $password;
		if ($submit == 'signin') {
			$this->signin();
		}
		if ($submit == 'login') {
			$this->login();
		}
	}

	public function signin(/*string $dbName*/) {
		//$mhc = new MongoHandlerClient($dbName);
		global $mhc;
		$db_user_not_exists = $mhc->newUserCollection();
		$user_not_exists = $mhc->newUser($this->user_name, $this->password);

		$this->message = "db_user_not_exists :"
			. strval($db_user_not_exists)
			. " - user_not_exists :"
			. strval($user_not_exists);
		return $this->message;
	}

	public function login() {
		
		return $this->message;
	}
}

?>