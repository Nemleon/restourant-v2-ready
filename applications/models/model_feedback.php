<?php

namespace applications\core;

use applications\lib;

Class Model_Feedback extends Model 
{
	public function get_data() 
	{

		$data = null;
		if (array_key_exists('errors', $_SESSION)) {
			
			$data = $_SESSION['errors'];
			unset($_SESSION['errors']);
			return $data;
		
		} elseif (array_key_exists('send', $_SESSION)) {
			
			$data['send'] = $_SESSION['send'];
			$data['name'] = $_SESSION['name'];
			unset($_SESSION['name'], $_SESSION['send']);
			return $data;
			
		}
		
		return $data;
		
	}
}