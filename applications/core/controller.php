<?php

namespace applications\core;

abstract class Controller 
{	
	protected $model;
	protected $view;
	
	function __construct () 
	
	{
		$this->view= new View();
		
	}
	
	protected function checkCart () 
	{
		
		$cart = 'Корзина пуста';
		
		session_start();
		if (array_key_exists('products', $_SESSION)){
			if ($_SESSION['products'] != null ) {
				
				return $_SESSION;
				
			}
		}
		
		return $cart;
		
	}
	
	protected function action_index() 
	{
		
	}
	
}