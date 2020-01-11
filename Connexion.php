<?php 

class Connexion {

	public $user_name;
	public $password;
	public $message;

	function __construct(string $submit, string $user, string $password) {

		$this->user_name = $user;
		$this->password = $password;
		$this->message .= $user . ' ' . $password;
		if ($submit == 'signin') {
			$this->signin();
		}
		if ($submit == 'login') {
			$this->login();
		}
	}

	public function signin() {
		return $this->message;
	}

	public function login() {
		return $this->message;
	}
}

?>