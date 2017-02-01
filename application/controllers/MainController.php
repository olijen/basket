<?php

class MainController extends Controller {

	function byDefault() {
		$this->view->create('main.php');
	}

}

?>