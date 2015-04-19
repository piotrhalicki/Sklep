<?php
require '../klasy/user.php';

class UserTest extends PHPUnit_Extensions_Database_TestCase {

	public static function setUpBeforeClass(){
		$serverName = 'localhost';
		$conn = new mysqli ($serverName, $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'], $GLOBALS['DB_NAME']);
		if($conn->connect_error) {
			die("Błąd połączenia z bazą.<br>Błąd: ".$conn->connect_error);
		}
		User::$conn = $conn;
	}
	
	public function getConnection() {
		$conn = new PDO($GLOBALS['DB_DSN'],
						$GLOBALS['DB_USER'],
						$GLOBALS['DB_PASSWD']);
		return new PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection($conn, $GLOBALS['DB_NAME']);
	}
	
	public function getDataSet(){
		$dataFlatXML = $this->createFlatXmlDataSet('./mydataset.xml');
		return $dataFlatXML;
	}
	
	public function test_newUser(){
		$user = new User;
		$this->assertEquals("", $user->get_imie(), "nowy User ma puste pole imie");
		$this->assertEquals("", $user->get_nazwisko(), "nowy User ma puste pole nazwisko");
		$this->assertEquals("", $user->get_email(), "nowy User ma puste pole email");
		$this->assertEquals("", $user->get_id(), "nowy User ma puste pole id");
		$this->assertEquals("", $user->get_adres(), "nowy User ma puste pole adres");
	
		$user->set_imie("Jan");
		$this->assertEquals("Jan", $user->get_imie(), "nowy User ma nastawione nowe imie");
		$this->assertNotEquals("Kowalski", $user->get_imie(), "nowy User nie ma nastawionego imienia Kowalski");
				
		$user->set_nazwisko("Kowalski");
		$this->assertEquals("Kowalski", $user->get_nazwisko(), "nowy User ma nastawione nowe nazwisko");
		$this->assertNotEquals("Jan", $user->get_nazwisko(), "nowy User nie ma nastawionego nazwiska Jan");
				
		$user->set_email("Jan.Kowalski@wp.pl");
		$this->assertEquals("Jan.Kowalski@wp.pl", $user->get_email(), "nowy User ma nastawionego nowego maila");
		$this->assertNotEquals("Kowalski.Jan@wp.pl", $user->get_email(), "nowy User nie ma nastawionego maila Kowalski.Jan@wp.pl");
				
		$user->set_adres("ul. Marszałkowska 6 m.54");
		$this->assertEquals("ul. Marszałkowska 6 m.54", $user->get_adres(), "nowy User ma nastawiony nowy adres");
		$this->assertNotEquals("ul. Marszałkowska 16 m.154", $user->get_adres(), "nowy User nie ma nastawionego adresu ul. Marszałkowska 16 m.154");
	}
		
	public function test_createUser() {
		$user2 = new User;
		$user2->createUser('Adam', 'Nowak', 'Adam.Nowak@wp.pl', '123', 'ul. Świętokrzyska m.10');
		var_dump($user2);
		$this->assertEquals("Adam", $user2->get_imie(), "xxx");
		$this->assertEquals("Nowak", $user2->get_nazwisko(), "xxx");
		$this->assertEquals("Adam.Nowak@wp.pl", $user2->get_email(), "xxx");
		$this->assertEquals("ul. Świętokrzyska m.10", $user2->get_adres(), "xxx");
		
		$test = $user2->logUser('Adam.Nowak@wp.pl', '123');
		$this->assertTrue($test, "xxx");
	}

	
}



?>