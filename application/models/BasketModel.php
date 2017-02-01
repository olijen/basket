<?php

class BasketModel extends Model {
	function add($customer, $time, $id, $quantity) {
		try {
			$query = "INSERT INTO basket VALUES(
			NULL,
			'$customer',
			'$time',
			'$id',
			'$quantity')
			ON DUPLICATE KEY UPDATE quantity = quantity + 1, time = '$time'";
			
			if(!$this->_db->query($query)) {
				throw new Exception($this->_db->error);
			}
		}
		catch(Exception $e) {
			exit($e->getMessage());
		}
	}
	
	function del($id) {
		try {
			$query = "DELETE FROM basket WHERE id = $id";
			
			if(!$this->_db->query($query)) {
				throw new Exception($this->_db->error);
			}
		}
		catch(Exception $e) {
			exit($e->getMessage());
		}
	}
	
	function get() {
		try {
			$query = "SELECT basket.id, books.author, books.title, books.price, basket.quantity
			FROM basket, books WHERE basket.book = books.id AND
			basket.customer = '".session_id()."'
			ORDER BY basket.id DESC";
			
			$result = $this->_db->query($query);
			if(!$result) {
				throw new Exception($this->_db->error);
			}
			$basket = array();
			while($row = $result->fetch_assoc()) {
				$basket[] = $row;
			}
			return $basket;
		}
		catch(Exception $e) {
			exit($e->getMessage());
		}
	}
	
	function update($id, $quantity) {
		try {
			$query = "UPDATE basket SET quantity = $quantity";
			
			if(!$this->_db->query($query)) {
				throw new Exception($this->_db->error);
			}
		}
		catch(Exception $e) {
			exit($e->getMessage());
		}
	}
}

?>