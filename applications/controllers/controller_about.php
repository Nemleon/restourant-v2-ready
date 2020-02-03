<?php

namespace applications\core;

class Controller_About extends Controller 
{
	function action_index()
	{	
	
		$cart = parent::checkCart();
		$this->view->generate('about_view.php', 'template_view.php', $title = 'О  нас', null, $cart);
		
	}
}