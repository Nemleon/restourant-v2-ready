<?php

namespace applications\core;

class Controller_Order extends Controller 
{
	function action_index() 
	{	
	
		$this->model = new Model_Order();
		$this->view = new View();
		
		$cart = parent::checkCart();
		$data = $this->model->get_data();
		
		if (is_array($data)) {
			
			$title = 'Заказ успешно оформлен';
			
		} else {
			
			$title = 'Ууупс';
			
		}
		
		$this->view->generate('order_view.php', 'template_view.php', $title, $data, $cart);
		
	}
}