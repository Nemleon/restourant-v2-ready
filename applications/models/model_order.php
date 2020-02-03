<?php

namespace applications\core;

use applications\lib;

Class Model_Order extends Model 
{
	public function get_data() 
	{
		
		if (!isset($_SESSION['products'])) {
			
			header ('Location:http://restourant.com/');
			
		}
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			

			list($errors, $input) = lib\validator::validateInputs($_POST);
			
			if($errors) {
			
				$_SESSION['errors'] = $errors;
				header ('Location:http://restourant.com/cart');
			
			} elseif (!$errors && $input) {
		
				$data = $this->formArrayForSend($input);
				
				$send = lib\phpMailer\send_mail::send($data, 'Заказ');
				
				if ($send != 'В обработке') {
					
					return $send;
					
				} else {
					
					unset($_SESSION['products']);
					return $input;
					
				}			
			}
			
		} else {
			
			header ('Location:http://restourant.com/');
			
		}
	}

	private	function formArrayForSend($input) 
	{
		
		$name = $input['Имя'];
		$order = '<ul>';
	
		foreach($_SESSION['products'] as $id => $value) {
			
			$order .= "<li>{$value['propers']['name']} {$value['count']} шт</li>";
			
		}
		
		$order .= '</ul>';
		
		$sum = $_SESSION['cart_cost'];
		$phoneNumber = $input['Номер_телефона'];
		
		if (isset($input['Способ_доставки'])) {
			
			$street = $input['Название_улицы'];
			$house = $input['Номер_дома'];
			$apartment = $input['Номер_квартиры'];
			$entrance = $input['Номер_подъезда/парадной'];
			
			return array ($name, $order, $sum, $phoneNumber, $street, $house, $apartment, $entrance);
			
		}
		
		return array ($name, $order, $sum, $phoneNumber);
		
	}		
} 