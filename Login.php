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
			$this->login($user_name, $password);
		}
	}

	public function signin(/*string $dbName*/) {
		//$mhc = new MongoHandlerClient($dbName);
		global $mhc;
		$db_user_not_exists = $mhc->newUserCollection();
		$user_not_exists = $mhc->newUser($this->user_name, $this->password);

		if($user_not_exists == false) {
			$this->message = "L'utilisateur ". $this->user_name." existe déjà";
		}else{
			$this->message = "L'utilisateur ". $this->user_name." a été créé, vous pouvez vous connecter";
		}

		return $this->message;
	}

	public function login($user_name, $password) {
		global $mhc;
		$auth = $mhc->login($user_name, $password);
		if($auth == true) {
			$_SESSION['login'] = ['user' => $user_name];
			header('Location:'.$_SERVER['PHP_SELF']);
		}else{
			$this->message = "Les identifiants ne sont pas bon";
			return $this->message;
		}
	}
}

?>