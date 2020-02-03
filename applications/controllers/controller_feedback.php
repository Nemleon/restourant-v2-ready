<?php

namespace applications\core;

class Controller_Feedback extends Controller 
{
	function action_index() 
	{	
	
		$cart = parent::checkCart();
		$this->view = new View();
		$this->model = new Model_Feedback();
		$data = $this->model->get_data();
		$this->view->generate('feedback_view.php', 'template_view.php', $title = 'Обратная связь', $data, $cart);
		
	}
	
	function action_sendFeedback () 
	{
		
		session_start();
		$this->model = new Model_sendFeedback();
		$this->model->get_data();
		
	}
}