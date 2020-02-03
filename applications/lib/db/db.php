<?php

namespace applications\lib\db;

use applications\lib\errors_log\writeErrors;
use \PDO;

Class db 
{

	//Переменные, установленные по умолчанию для входа в БД
	private $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=restourant;charset=utf8';
    private $user = 'root';
    private $pass = '';
    private $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

	//Метод подключения к базе данных
	protected function db_connect() 
	{
		
		try {
			
			$DBH = new PDO ($this->dsn, $this->user, $this->pass, $this->options);
			set_time_limit(15);
			
		} catch (\Exception $e) {
			
			$time = date('Y-m-d H:i:s (T)') . "\n";
			$error = $e . "\r\n";
			writeErrors::write_errors($time, $error);
			header($_SERVER['SERVER_PROTOCOL'] . ' 504 Gateway Timeout', true, 504);
			include "applications/views/504_view.php";
			exit();
			
		}
		
		return $DBH;
		
	}
}