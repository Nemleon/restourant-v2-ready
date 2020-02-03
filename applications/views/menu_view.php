<?php 	list($dishes, $drinks, $jams) = $data; ?>

<div class = 'spaceText'><h1>ВАЖНО! Перед любыми действиями на сайте, обязательно ознакомьтесь с информацией во вкладке "О нас"! Всем добра и позитива!)</h1>
	<h1>Меню</h1>
</div>	

<div class = 'articles'><h2>Сладости</h2></div>
<div class = 'spaceMenu'>

<?php 
	$id = 1000; 
	for ($t=0; $t < count($dishes); $t++) { $id += 1;
		if( $cart == 'Корзина пуста' || !array_key_exists($dishes[$t]["id"], $cart['products'])) { 
?>
			<label class = "label<?= $dishes[$t]["id"] ?> menuLabel" for = "add<?= $dishes[$t]["id"] ?>"><div class = 'menu' id = 'div<?= $dishes[$t]["id"] ?>'>	
			
		<?php } elseif (array_key_exists($dishes[$t]["id"], $cart['products'])) { ?>
		
			<label class = "label<?= $dishes[$t]["id"] ?> menuLabel" for = "del<?= $dishes[$t]["id"] ?>" id = "onHover"><div class = 'menu selected' id = 'div<?= $dishes[$t]["id"] ?>'>
			
		<?php } ?>
				<div class = 'nameFood' value = '<?= $dishes[$t]["name"] ?>'> Название: <?= $dishes[$t]["name"] ?> </div>
				<div class = 'cost'> Стоимость: <?= $dishes[$t]["cost"] ?> (грн) </div>
				<div class = 'mass'> Масса: <?= $dishes[$t]["mass"] ?> (грамм) </div>
				<div class = 'image'> <img src= '<?= $dishes[$t]["url"] ?>' width = '100%' height = '50%'> </div>	
				<div class = "add_del_cart">
					<?php if( $cart == 'Корзина пуста' || !array_key_exists($dishes[$t]["id"], $cart['products'])) { ?>
					
						<button id = 'del<?= $dishes[$t]["id"] ?>' class='miniCartDel buttonMenuDel' onclick = "changeDiv('del<?= $dishes[$t]["id"] ?>', 'add<?= $dishes[$t]["id"] ?>', '<?= $dishes[$t]["id"] ?>')" style = "display:none"
							data-action='deleteItem' 
							data-id='<?= $dishes[$t]["id"] ?>'>
							Убрать из корзины
						</button>
						<button id = 'add<?= $dishes[$t]["id"] ?>' class='miniCartAdd buttonMenuAdd' onclick = "changeDiv('add<?= $dishes[$t]["id"] ?>', 'del<?= $dishes[$t]["id"] ?>', '<?= $dishes[$t]["id"] ?>')"
							data-action='addToCart' 
							data-id='<?= $dishes[$t]["id"] ?>' 
							data-name='<?= $dishes[$t]["name"] ?>' 
							data-cost='<?= $dishes[$t]["cost"] ?>' 
							data-img='<?= $dishes[$t]["url"] ?>'>
							Добавить в корзину
						</button>
						
					<?php } elseif (array_key_exists($dishes[$t]["id"], $cart['products'])) { ?>
						
						<button id = 'del<?= $dishes[$t]["id"] ?>' class='miniCartDel buttonMenuDel' onclick = "changeDiv('del<?= $dishes[$t]["id"] ?>', 'add<?= $dishes[$t]["id"] ?>', '<?= $dishes[$t]["id"] ?>')"
							data-action='deleteItem' 
							data-id='<?= $dishes[$t]["id"] ?>'>
							Убрать из корзины
						</button>
						<button id = 'add<?= $dishes[$t]["id"] ?>' class='miniCartAdd buttonMenuAdd' onclick = "changeDiv('add<?= $dishes[$t]["id"] ?>', 'del<?= $dishes[$t]["id"] ?>', '<?= $dishes[$t]["id"] ?>')" style = "display:none" 
							data-action='addToCart' 
							data-id='<?= $dishes[$t]["id"] ?>' 
							data-name='<?= $dishes[$t]["name"] ?>' 
							data-cost='<?= $dishes[$t]["cost"] ?>' 
							data-img='<?= $dishes[$t]["url"] ?>'>
							Добавить в корзину
						</button>
						
					<?php } ?>
				</div>
			</div></label>
			
	<?php } ?>
</div>
	
<div class = 'articles'><h2>Напитки</h2></div>
<div class = 'spaceMenu'>	
	
<?php 
	$id = 2000; 
	for ($t=0; $t < count($drinks); $t++) { $id += 1;
		if( $cart == 'Корзина пуста' || !array_key_exists($drinks[$t]["id"], $cart['products'])) { 
?>
			<label class = "label<?= $drinks[$t]["id"] ?> menuLabel" for = "add<?= $drinks[$t]["id"] ?>"><div class = 'menu' id = 'div<?= $drinks[$t]["id"] ?>'>	
			
		<?php } elseif (array_key_exists($drinks[$t]["id"], $cart['products'])) { ?>
		
			<label class = "label<?= $drinks[$t]["id"] ?> menuLabel" for = "del<?= $drinks[$t]["id"] ?>" id = "onHover"><div class = 'menu selected' id = 'div<?= $drinks[$t]["id"] ?>'>
			
		<?php } ?>
				<div class = 'nameFood' value = '<?= $drinks[$t]["name"] ?>'> Название: <?= $drinks[$t]["name"] ?> </div>
				<div class = 'cost'> Стоимость: <?= $drinks[$t]["cost"] ?> (грн) </div>
				<div class = 'mass'> Масса: <?= $drinks[$t]["mass"] ?> (мл) </div>
				<div class = 'image'> <img src= '<?= $drinks[$t]["url"] ?>' width = '100%' height = '50%'> </div>	
				<div class = "add_del_cart">
					<?php if( $cart == 'Корзина пуста' || !array_key_exists($drinks[$t]["id"], $cart['products'])) { ?>
					
						<button id = 'del<?= $drinks[$t]["id"] ?>' class='miniCartDel buttonMenuDel' onclick = "changeDiv('del<?= $drinks[$t]["id"] ?>', 'add<?= $drinks[$t]["id"] ?>', '<?= $drinks[$t]["id"] ?>')" style = "display:none"
							data-action='deleteItem' 
							data-id='<?= $drinks[$t]["id"] ?>'>
							Убрать из корзины
						</button>
						<button id = 'add<?= $drinks[$t]["id"] ?>' class='miniCartAdd buttonMenuAdd' onclick = "changeDiv('add<?= $drinks[$t]["id"] ?>', 'del<?= $drinks[$t]["id"] ?>', '<?= $drinks[$t]["id"] ?>')"
							data-action='addToCart' 
							data-id='<?= $drinks[$t]["id"] ?>' 
							data-name='<?= $drinks[$t]["name"] ?>' 
							data-cost='<?= $drinks[$t]["cost"] ?>' 
							data-img='<?= $drinks[$t]["url"] ?>'>
							Добавить в корзину
						</button>
						
					<?php } elseif (array_key_exists($drinks[$t]["id"], $cart['products'])) { ?>
						
						<button id = 'del<?= $drinks[$t]["id"] ?>' class='miniCartDel buttonMenuDel' onclick = "changeDiv('del<?= $drinks[$t]["id"] ?>', 'add<?= $drinks[$t]["id"] ?>', '<?= $drinks[$t]["id"] ?>')"
							data-action='deleteItem' 
							data-id='<?= $drinks[$t]["id"] ?>'>
							Убрать из корзины
						</button>
						<button id = 'add<?= $drinks[$t]["id"] ?>' class='miniCartAdd buttonMenuAdd' onclick = "changeDiv('add<?= $drinks[$t]["id"] ?>', 'del<?= $drinks[$t]["id"] ?>', '<?= $drinks[$t]["id"] ?>')" style = "display:none"
							data-action='addToCart' 
							data-id='<?= $drinks[$t]["id"] ?>' 
							data-name='<?= $drinks[$t]["name"] ?>' 
							data-cost='<?= $drinks[$t]["cost"] ?>' 
							data-img='<?= $drinks[$t]["url"] ?>'>
							Добавить в корзину
						</button>
						
					<?php } ?>
				</div>
			</div></label>
			
	<?php } ?>
</div>

<div class = 'articles'><h2>Джемы</h2></div>	
<div class = 'spaceMenu'>

<?php 
	$id = 3000; 
	for ($t=0; $t < count($jams); $t++) { $id += 1;
		if( $cart == 'Корзина пуста' || !array_key_exists($jams[$t]["id"], $cart['products'])) { 
?>
			<label class = "label<?= $jams[$t]["id"] ?> menuLabel" for = "add<?= $jams[$t]["id"] ?>"><div class = 'menu' id = 'div<?= $jams[$t]["id"] ?>'>	
			
		<?php } elseif (array_key_exists($jams[$t]["id"], $cart['products'])) { ?>
		
			<label class = "label<?= $jams[$t]["id"] ?> menuLabel" for = "del<?= $jams[$t]["id"] ?>" id = "onHover"><div class = 'menu selected' id = 'div<?= $jams[$t]["id"] ?>'>
			
		<?php } ?>
				<div class = 'nameFood' value = '<?= $jams[$t]["name"] ?>'> Название: <?= $jams[$t]["name"] ?> </div>
				<div class = 'cost'> Стоимость: <?= $jams[$t]["cost"] ?> (грн) </div>
				<div class = 'mass'> Масса: <?= $jams[$t]["mass"] ?> (грамм) </div>
				<div class = 'image'> <img src= '<?= $jams[$t]["url"] ?>' width = '100%' height = '50%'> </div>	
				<div class = "add_del_cart">
					<?php if( $cart == 'Корзина пуста' || !array_key_exists($jams[$t]["id"], $cart['products'])) { ?>
					
						<button id = 'del<?= $jams[$t]["id"] ?>' class='miniCartDel buttonMenuDel' onclick = "changeDiv('del<?= $jams[$t]["id"] ?>', 'add<?= $jams[$t]["id"] ?>', '<?= $jams[$t]["id"] ?>')" style = "display:none"
							data-action='deleteItem' 
							data-id='<?= $jams[$t]["id"] ?>'>
							Убрать из корзины
						</button>
						<button id = 'add<?= $jams[$t]["id"] ?>' class='miniCartAdd buttonMenuAdd' onclick = "changeDiv('add<?= $jams[$t]["id"] ?>', 'del<?= $jams[$t]["id"] ?>', '<?= $jams[$t]["id"] ?>')"
							data-action='addToCart' 
							data-id='<?= $jams[$t]["id"] ?>' 
							data-name='<?= $jams[$t]["name"] ?>' 
							data-cost='<?= $jams[$t]["cost"] ?>' 
							data-img='<?= $jams[$t]["url"] ?>'>
							Добавить в корзину
						</button>
						
					<?php } elseif (array_key_exists($jams[$t]["id"], $cart['products'])) { ?>
						
						<button id = 'del<?= $jams[$t]["id"] ?>' class='miniCartDel buttonMenuDel' onclick = "changeDiv('del<?= $jams[$t]["id"] ?>', 'add<?= $jams[$t]["id"] ?>', '<?= $jams[$t]["id"] ?>')"
							data-action='deleteItem' 
							data-id='<?= $jams[$t]["id"] ?>'>
							Убрать из корзины
						</button>
						<button id = 'add<?= $jams[$t]["id"] ?>' class='miniCartAdd buttonMenuAdd' onclick = "changeDiv('add<?= $jams[$t]["id"] ?>', 'del<?= $jams[$t]["id"] ?>', '<?= $jams[$t]["id"] ?>')" style = "display:none"
							data-action='addToCart' 
							data-id='<?= $jams[$t]["id"] ?>' 
							data-name='<?= $jams[$t]["name"] ?>' 
							data-cost='<?= $jams[$t]["cost"] ?>' 
							data-img='<?= $jams[$t]["url"] ?>'>
							Добавить в корзину
						</button>
						
					<?php } ?>
				</div>
			</div></label>
			
	<?php } ?>
</div>	