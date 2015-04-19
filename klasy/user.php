<?php

class User{
	
	static public $conn;
	public $id;
	public $imie;
	public $nazwisko;
	public $email;
	public $pass;
	public $adres;
	
	public static function conn($conn){
		User::$conn = $conn;
	}
	
	public function __construct() {
		$this->imie = "";
		$this->nazwisko = "";
		$this->email = "";
		$this->pass = "";
		$this->adres = "";
	}
	
	public function get_id(){
		return $this->id;
	}
	
	public function set_imie($imie) {
		$this->imie = $imie;
	}
	
	public function get_imie() {
		return $this->imie;
	}
	
	public function set_nazwisko($nazwisko) {
		$this->nazwisko = $nazwisko;
	}
	
	public function get_nazwisko() {
		return $this->nazwisko;
	}
	
	public function set_email($email) {
		$this->email = $email;
	}
	
	public function get_email() {
		return $this->email;
	}
	
	public function set_adres($adres) {
		$this->adres = $adres;
	}
	
	public function get_adres() {
		return $this->adres;
	}
	
// C[reate]R[ead]U[pdate]D[elete]
	
	public function createUser($imie, $nazwisko, $email, $pass, $adres){
		$this->imie = $imie;
		$this->nazwisko = $nazwisko;
		$this->email = $email;
		$this->adres = $adres;
		
		$options = [
				'cost' => 11,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
		$this->pass = password_hash($pass, PASSWORD_BCRYPT, $options);
				
		$sqlQuery = "INSERT INTO Users(users_imie, users_nazwisko, users_email, users_pass, users_adres)
					VALUES('$this->imie', '$this->nazwisko', '$this->email', '$this->pass', '$this->adres')";
		$result = User::$conn->query($sqlQuery);
		$this->id = User::$conn->insert_id;
		var_dump($this->id);
		var_dump($result);
	}

	public function logUser($email, $pass) {
		$sqlQuery = "SELECT * FROM Users WHERE users_email = '$email'";
		$result = User::$conn->query($sqlQuery);
		//var_dump($result);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$this->id = $row['users_id'];
			$hashed_pass = $row['users_pass'];
			if(password_verify($pass, $hashed_pass)){
				return true;
			}
		}
	}			
				
// usunięcie usera - usuniecie danych z tablicy
/*		
	public function deleteUser(???) {
		$sqlQuery = "DELETE FROM User";
		$result = User::$conn->query($sqlQuery);
	
	}
	
/*
// modyfikacja usera - zmiana danych w tablicy
	
	public function updateUser(???) {
		$sqlQuery = "";
		$result = User::$conn->query($sqlQuery);
	
	}
	
*/	
// podgląd usera - wyświetlenie danych z tablicy
	
	public function showUser($id) {
		$sqlQuery = "SELECT * FROM Users WHERE users_id=$id";
		$result = User::$conn->query($sqlQuery);
		//echo "<pre>";
		//echo var_dump($result);
		//echo "</pre>";
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			//var_dump($row);
			$this->imie = $row['users_imie'];
			$this->nazwisko = $row['users_nazwisko']; 
			$this->email = $row['users_email'];
			$this->adres = $row['users_adres'];
			//return $result->fetch_assoc();
		}
		return null;
	}
}
	
?>