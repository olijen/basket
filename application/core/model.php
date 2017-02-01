<?

class Model {
	protected $_db;
	const DB_HOST = 'localhost';
	const DB_LOGIN = 'root';
	const DB_PASSWORD = '';
	const DB_NAME = 'mvc';
	
	
	function __construct() {
		try {
			$this->_db = @new mysqli(self::DB_HOST, self::DB_LOGIN, self::DB_PASSWORD, self::DB_NAME);
			if($this->_db->connect_errno) {
				throw new Exception('Ошибка подключения: '.$this->_db->connect_error);
			}
		}
		catch(Exception $e) {
			exit($e->getMessage());
		}
	}
	
	function __destruct() {
		$this->_db->close();
	}
}

?>