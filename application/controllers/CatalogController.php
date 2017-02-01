<?php

class CatalogController extends Controller {
	function byDefault() {
		$this->model = new CatalogModel();
		$catalog = $this->model->getCatalog();
		$this->view->create('catalog.php', $catalog);
	}
}

?>