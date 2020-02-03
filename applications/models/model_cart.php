<?php

namespace applications\core;

class Model_Cart extends Model 
{	
	private $products = array();
	
	public function get_data () 
	{
		//Проверяем действие, пришедшее в POST и, в зависимости от значения, вызываем нужную функцию
		if ($_POST) {
	
			if($_POST['action'] == 'addToCart') {
				
				$this->addToCart($_POST);
		
			} elseif ($_POST['action'] == 'plusItem') {
				
				$this->plusProductInCart($_POST['id']);
			
			} elseif ($_POST['action'] == 'minusItem') {
				
				$this->minusProductInCart($_POST['id']);				
		
			} elseif ($_POST['action'] == 'deleteItem') {

				$this->removeFromCart($_POST['id']);

			}
			//Проверка корзины на наличие товаров и выдача информации в корзину
			//(может отсутствовать, если все удалено)
			if ($this->products['products'] != null) {
				
				$cart = json_encode($this->products);
				return $cart;
		
			} else {

				return 'Корзина пуста';
			
			}
		}
	}	
	
	
	private function addToCart($products, $count=1) 
	{
		
		//проверяем,  не был ли добавлен товар в корзину ранее. Если да, то прибаляем колличество на 1
		if (!empty($_SESSION['products'][$products['id']]))  {
			
			$this->plusProductInCart($_POST['id']);
			
		} else {

			$_SESSION['products'][$products['id']] = $products;

			$_SESSION['products'][$products['id']]['count'] = $count;

			$this->updateCostCountInCart();
		
		}
	}
	
	private function updateCostCountInCart() 
	{
		//количество  товаров в корзине считаем как количество элементов в массиве $_SESSION['products']
		$_SESSION['products_incart'] = count($_SESSION['products']);
		
		//обнуляем стоимость (чтобы не суммировалось с предыдущими значениями)
		$_SESSION['cart_cost'] = 0;
		
		//стоимость  корзины (перемножаем цены на количество и складываем):
		foreach ($_SESSION['products'] as  $id => $value) {
			
			$_SESSION['cart_cost'] += $_SESSION['products'][$id]['propers']['cost'] *  $_SESSION['products'][$id]['count'];
			
		}
		//Записываем всю имеющуюся инфу в массив
		$this->products = $_SESSION;
		
	}
	
	private function plusProductInCart($product_id) 
	{
		
		$_SESSION['products'][$product_id]['count']++;
		$this->updateCostCountInCart();
		
	}
	
	private function minusProductInCart($product_id) 
	{
		if ($_SESSION['products'][$product_id]['count'] > 1)  {
			
			$_SESSION['products'][$product_id]['count']--;
			
		} else {
			
			unset($_SESSION['products'][$product_id]);
			
		}
		
		$this->updateCostCountInCart();
		
	}
	
	private function removeFromCart($product_id) 
	{
	
		unset($_SESSION['products'][$product_id]);			
		$this->updateCostCountInCart();
		
	}	
}