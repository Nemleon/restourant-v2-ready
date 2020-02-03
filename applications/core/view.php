<?php

namespace applications\core;

class View 
{
	function generate($contentView, $templateView, $title = 'Пожирашки у Михашки', $data = null, $cart = 'Корзина пуста')
	{

		include 'applications/views/' . $templateView;
		
	}
}
