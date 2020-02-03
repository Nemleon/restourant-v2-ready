<?php

namespace applications\core;

use applications\lib;

class Model_sendFeedback extends Model 
{	
	public function get_data () 
	{
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			list ($data, $code) = $this->validate();
			if ($code == 'errors') {
				
				$_SESSION['errors'] = $data;
				header('Location: http://restourant.com/feedback');
				
			} elseif ($code == 'nonErrors') {
				
				$send = lib\phpMailer\send_mail::send($data, 'Отзыв');

				$_SESSION['name'] = $data[0];
				$_SESSION['send'] = $send;
				header('Location: http://restourant.com/feedback');
		
			}	
		}
	}
	
	private function validate() 
	{				
		list ($inputs, $errors) = lib\validator::validateFeedback($_POST);
		if ($errors) {

			$data = $errors;
			return array ($data, 'errors');
			
		} elseif (!$errors && $inputs) { 			
			
			$data = array($inputs['Имя'], $inputs['Email'], $inputs['Сообщение']);
			return array($data, 'nonErrors');
			
		}	
	}
}