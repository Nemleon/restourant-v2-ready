<?php

namespace applications\core;

use applications\lib\db;

Class Model_Menu extends Model 
{
	public function get_data() 
	{

		$meals = new db\Get_data_db();
				
		/*
		Отправление функции select_data() информацию о таблицах.
		Запись полученных значений в переменные.
		Отправка данных далее.
		*/
		$drinks = $meals->select_data("SELECT * FROM drinks");
		$dishes = $meals->select_data("SELECT * FROM dishes");
		$jams = $meals->select_data("SELECT * FROM jams");

		$meals = null;
		
		return array ($dishes, $drinks, $jams);

    
	}	
}