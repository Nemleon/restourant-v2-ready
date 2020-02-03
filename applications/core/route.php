<?php

namespace applications\core;

Class Route 
{
 	public static function start () 
	{
	
		//Установка контроллера и действия по умолчанию
		$controllerName = 'Menu';
		$actionName = 'index';
	
		//Получение имён контроллера и действия из глобальной переменной
		//routes[0] - пустой
		
		$row = preg_replace('%[^a-z /]%i', '', trim(htmlentities( $_SERVER['REQUEST_URI'] ?? '')));
		$routes = explode('/', $row);
	
		if (!empty ($routes[1])) {
			$controllerName = $routes[1];
		}
	
		if (!empty ($routes[2])) {
			$actionName = $routes[2];
		}
	
		//Добавление приставки, для использования далее классов
		$modelName1 = 'Model_' . $controllerName;
		$modelName2 = 'Model_' . $actionName;
		$controllerName = 'Controller_' . $controllerName;
		$actionName = 'action_' . $actionName;

		//Подключение файлов с классом метода (может и не существовать)

		$modelFile1 = strtolower($modelName1).'.php';
		$modelPath1 = "applications/models/".$modelFile1;
		if(file_exists($modelPath1) || $modelPath1 == '') {
			require_once "applications/models/".$modelFile1;
		}

		$modelFile2 = strtolower($modelName2).'.php';
		$modelPath2 = "applications/models/".$modelFile2;
		if(file_exists($modelPath2) || $modelPath2 == '') {
			require_once "applications/models/".$modelFile2;
		}
	
		
		//Подключение файла с классом контроллера и перехват ошибок при отсутствии совпадений
		
		$controllerFile = strtolower($controllerName) . '.php';
		$controllerPath = 'applications/controllers/' . $controllerFile;

		if (file_exists($controllerPath)) {
			
			require_once 'applications/controllers/' . $controllerFile;
			
		} else {
			
			throw new \Exception('Directory not found');
			
		}
		
		$controllerClass = 'applications\\core\\' . $controllerName;
		
		$controller = new $controllerClass;
		$action = $actionName;

		if (method_exists($controller, $action)) {

			$controller->$action();
			
		} else {
			
			throw new \Exception ('Action not found');
			
		}
	}
} 