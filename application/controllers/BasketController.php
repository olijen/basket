<?php

class BasketController extends Controller {
	function byDefault() {
		$basket = $this->model->get();
		$this->view->create('basket.php', $basket);
	}
	
	function add() {
		if(isset($_GET['id'])) {
			$id = $_GET['id'] * 1;
			if(!$id) {
				exit('Действие невозможно');
			}
		}
		$customer = session_id();
		$time = time();
		$quantity = 1;
		
		$this->model->add($customer, $time, $id, $quantity);
		header('Location: /basket');
	}
	
	function del() {
		if(isset($_GET['id'])) {
			$id = $_GET['id'] * 1;
			if(!$id) {
				exit('Действие невозможно');
			}
		}
		$this->model->del($id);
		header('Location: /basket');
	}
	
	function update() {
		if(isset($_POST['id']) and isset($_POST['quantity'])) {
			$id = $_POST['id'] * 1;
			$quantity = $_POST['quantity'] * 1;
			if($id and $quantity) {
				$this->model->update($id, $quantity);
			}
			header('Location: /basket');
		}
	}
	
	function __construct() {
		parent::__construct();
		$this->model = new BasketModel();
	}
}

?>