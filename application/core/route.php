<?php

class Route {
	static function start() {
		$controller = 'main';
		$method = 'byDefault';
		
		$path = explode('/', $_SERVER['REQUEST_URI']);
		
		if(!empty($path[1])) {
			$controller = $path[1];
		}
		if(!empty($path[2])) {
			$method = $path[2];
			if(strpos($method, '?')) {
				$method = substr($method, 0, strpos($method, '?'));
			}
		}
		
		try {
			$controllerName = ucfirst($controller).'Controller';
			$controllerPath = 'application/controllers/'.$controllerName.'.php';
			if(!file_exists($controllerPath)) {
				throw new Exception('Страница не существует');
			}
			include $controllerPath;
		}
		catch(Exception $e) {
			exit($e->getMessage());
		}
		
		$modelName = ucfirst($controller).'Model';
		$modelPath = 'application/models/'.$modelName.'.php';
		if(file_exists($modelPath)) {
			include $modelPath;
		}
		
		try {
			$controllerObj = new $controllerName();
			
			if(!method_exists($controllerObj, $method)) {
				throw new Exception('Действие невозможно');
			}
			$controllerObj->$method();
		}
		catch(Exception $e) {
			exit($e->getMessage());
		}
	}
}

?>