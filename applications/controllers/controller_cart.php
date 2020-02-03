<?php

namespace applications\core;

class Controller_Cart extends Controller 
{	
	function action_index() 
	{	
	
		$this->model = new Model_Cart();

		$cart = parent::checkCart();
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$data = $this->model->get_data();
			print_r($data);
			
		} else {
			
			$this->view = new View();
			$data = NULL;
			
			if(array_key_exists('errors', $_SESSION)) {
				
				$data = $_SESSION['errors'];
				unset($_SESSION['errors']);
				
			}		
			
			$this->view->generate('cart_view.php', 'template_view.php', $title = 'Корзина', $data, $cart);
			
		}
	}
}