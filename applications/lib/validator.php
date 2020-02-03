<?php

namespace applications\lib;

class validator
{
	static function validateInputs ($choose) 
	{
		
		$errors = [];
		$input = [];
		
		if (array_key_exists('Способ_доставки', $choose) && $choose['Способ_доставки'] == 'no') {
			
			$trimmed = "\t\n\r\0\x0B\x00..\x1F\\s\\-?";
			
			if(preg_match('/^([а-яА-ЯЁёa-zA-Z0-9_ ]+)$/u', trim(htmlentities($choose['Имя'] ?? ''), $trimmed))) {
				
				$inputs['Имя'] = $choose['Имя'];
				
			} else {	
			
				$errors['Имя'] = 'Имя';
				
			}
			
			if(preg_match('/^([а-яА-ЯЁёa-zA-Z0-9_ ]+)$/u', trim(htmlentities($choose['Номер_телефона'] ?? ''), $trimmed))) {
				
				$inputs['Номер_телефона'] = $choose['Номер_телефона'];
				
			} else {	
			
				$errors['Номер_телефона'] = 'Номер телефона';
				
			}

		} else {
			
			foreach ($choose as $key => $value) {
					
				$trimmed = "\t\n\r\0\x0B\x00..\x1F\\s\\-?";		
				
				if(preg_match('/^([а-яА-ЯЁёa-zA-Z0-9_ ]+)$/u', trim(htmlentities($value ?? ''), $trimmed))) {
				
					$inputs[$key] = $choose[$key];
				
				} else {
				
					$errors[$key] = str_replace("_", " ", $key);
				
				}	
			}
		}
		
		return array ($errors, $inputs);
		
	}
	
	
	public function validateFeedback ($choose) 
	{
		
		$inputs = [];
		$errors = [];
		
		$trimmed = "\t\n\r\0\x0B\x00..\x1F\\s\\-?";
		
		if(preg_match('/^([а-яА-ЯЁёa-zA-Z0-9_ ]+)$/u', trim(htmlentities($choose['Имя'] ?? ''), $trimmed))) {	
		
			$inputs['Имя'] = $choose['Имя'];	
			
		} else {		
		
			$errors['Имя'] = 'Имя';	
			
		}
		

		if(preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i', trim(htmlentities($choose['Email'] ?? ''), $trimmed))) {
			
			$inputs['Email'] = $choose['Email'];
			
		} else {	
		
			$errors['Email'] = 'Email';	
			
		}
		
		$inputs['Сообщение'] = trim(htmlentities ($choose['Сообщение'] ?? ''), $trimmed);
		if (! strlen($inputs['Сообщение'])) {
			
			$errors['Сообщение'] = 'Сообщение';
			
		}

		return array($inputs, $errors);
		
	}
}