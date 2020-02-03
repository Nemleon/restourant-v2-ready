<?php

namespace applications\core;

class Controller_Menu extends Controller 
{	
	function action_index() 
	{
		
		$this->model = new Model_Menu();
		$this->view = new View();
		$cart = parent::checkCart();
		$data = $this->model->get_data();
		$this->view->generate('menu_view.php', 'template_view.php', $title = 'Пожирашки у Михашки', $data, $cart);
		
	}
}