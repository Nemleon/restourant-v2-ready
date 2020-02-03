<?php

namespace applications\core;

class Controller_Contacts extends Controller 
{
	function action_index()
	
	{	
		$cart = parent::checkCart();
		$this->view->generate('contacts_view.php', 'template_view.php', $title = 'Контакты', null, $cart);
		
	}
}