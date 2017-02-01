<?php

class View {
	function create($content, $data = NULL, $template = 'application/views/template.php') {
		include $template;
	}
}

?>