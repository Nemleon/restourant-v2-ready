<?php
// подключаем файлы ядра
spl_autoload_register(function ($class_name) {
	
	$file = str_replace('\\' , '/', strtolower($class_name)) . '.php';

	if(file_exists($file)){
		
		require_once $file;
		
	} else {
		
		throw new \Exception('Class not found');
		
	}
});


/* 
Запускаем маршрутизатор. Перехватываем ошибку, если страница не найдена,
и отправляем код 404
*/

try {
	
	\applications\core\route::start();

} catch (\Exception $e) {	

	if ($e) {
		
		header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found', true, 404);
		include "applications/views/404_view.php";
		exit();
		
	}
}