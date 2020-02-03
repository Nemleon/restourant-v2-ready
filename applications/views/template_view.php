<!DOCTYPE HTML>
<html lang='ru'>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="height=device-height,width=450">
		<link rel="shortcut icon" href="images/ico.png" type="image/png">
		<title><?= $title ?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="/js/jquery-3.4.1.js"></script>
		<script src="js/hidder.js"></script>		
		<script src="js/changeDiv.js"></script>
		<script src="js/visibility.js"></script>
	</head>
	<body>
		<header class='header'>
		<div class = 'headerSpace'>
			<div class = 'logo'>
				<a class = 'linkLogo' href="/"><img src = 'images/logomak_logo.png' alt = 'Пожирашки у Михашки' width = '100%' height = '50'></a>
			</div>
			<div class = 'hat' id = 'headerBox'>
				<div class = 'linkDiv'><a class = 'link' href="/">Главная/Меню</a></div>
			
				<div class = 'linkDiv'><a class = 'link' href="/contacts">Контакты</a></div>
			
				<div class = 'linkDiv'><a class = 'link' href="/about">О нас</a></div>
			
				<div class = 'linkOrangeDiv'><a class = 'link' href="/feedback">Обратная связь</a></div>
			</div>
			<div class = 'navigation' onClick="visibility('headerBox')">
				<span><img src = 'images/hamburger_icon.svg.png' alt = 'navigation' width = '40' height = '40'></span>
			</div>
		</div>
		</header>
		
		<div class = 'wrapper'>	
			<?php if ($_SERVER['REQUEST_URI'] != '/cart' && $_SERVER['REQUEST_URI'] != '/order') { ?>
			
				<div class="backgroundCart" id = 'backgroundCart'>
					<span class = "exitCart" onclick = "visibility('backgroundCart')"><img src = 'images/cross.png' alt = 'X' width = "30"  height = "30"></span>
					<div class = "miniCartView" id = 'miniCartView' >
						<div class = 'articles'><h2>Корзина</h2></div>
						<div class = 'spaceContent'>
							<div class = "spaceCart">
								<?php if ($cart != 'Корзина пуста') { ?>
									<p class = "orderAlarm"><b>*Изменить количество порций Вы сможете на странице заказа</b></p>
									<p><b>Ваш выбор:</b></p>
									<table>
										<?php foreach ($cart['products'] as $id => $value) { ?>
											<tr id = "miniCart<?= $id ?>">
												<td><button class = "button" onclick = "deleteItemFrCart('<?= $id ?>', 'deleteItem'); changeDiv('del<?= $id ?>', 'add<?= $id ?>', '<?= $id ?>');">
													<span class = "cartBut"><img class = "cartButtImg" src = 'images/cross.png' alt = 'X'></span>
												</button></td>
												<td><img src = <?= $value['propers']['img'] ?> alt = <?= $value['propers']['name'] ?> width = '50' height = '50'></td>
												<td><?= $value['propers']['name'] ?></td>									
											</tr>	
										<?php } ?>
										<tr>
											<td colspan = "3" id = "cartCost"><b>Стоимость равна: <?= $cart['cart_cost'] ?> грн</b></td>
										</tr>
									</table>
									<div class = "linkOrangeDiv"><a href="/cart" class = 'linkOrange'>Перейти к заказу</a></div>
								<?php } else { ?>
								
									<p>Корзина пуста</p>
									
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php if ($cart === 'Корзина пуста') { ?>
				
					<button class="showCart"  type="image" onclick="visibility('backgroundCart')">
						<img src="images/корзина-для-сайта-png-4.png" width = '50' height = '50' >
						<span class = "counter" style="display:none">
						</span>
					</button>
				
				<?php } else { ?>
				
					<button class="showCart"  type="image" onclick="visibility('backgroundCart')">
						<img src="images/корзина-для-сайта-png-4.png" width = '50' height = '50' >
						<span class = "counter">
							<?= $cart['products_incart'] ?>
						</span>
					</button>
				
				<?php } ?>
			
			<?php } ?>
			
			<div class = 'main'>
			
				<?php include 'applications/views/'.$contentView; ?>
			
			</div>
		</div>
		<footer class = 'footer'>
				<div class = 'footSpace'>
					<div class = 'footImg'><img src = 'images/logomak_logo.png' alt = 'Пожирашки у Михашки' width = '200' height = '50'></div>
					<div class = 'footList'>
						<a class = 'foot' href="/">Главная/Меню</a>
						<a class = 'foot' href="/contacts">Контакты</a>
						<a class = 'foot' href="/about">О нас</a>
						<a class = 'foot' href="/feedback">Обратная связь</a>
					</div>
					<div class = 'footEnd'><b>&copy; 2019</b></div>
				</div>
		</footer>
		<script type="text/javascript" src="js/changeMiniCart.js"></script>
		<script type="text/javascript" src="js/validation_inputs.js"></script>
	</body>
</html>