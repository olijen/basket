<?

class CatalogModel extends Model {
	function getCatalog() {
		try {
			$query = "SELECT id, author, title, pubyear, price FROM books";
			$result = $this->_db->query($query);
			if(!$result) {
				throw new Exception('Ошибка: '.$this->_db->error);
			}
			$catalog = array();
			while($row = $result->fetch_assoc()) {
				$catalog[] = $row;
			}
			return $catalog;
		}
		catch(Exception $e) {
			exit($e->getMessage());
		}
	}
}

?>