<?php if (is_string($data)) { ?>
	<h1>Ошибочка</h1>
	<div class = 'articles'><h2>Упс!(</h2></div>
	<div class = 'spaceContent'>
		<p class = "orderErr"> <?= $data ?></p>
	</div>
<?php } elseif (is_array($data)) { ?>
	<h1>Поздравляем!</h1>
	<div class = 'articles'><h2>Ваш заказ успешно оформлен</h2></div>
	<div class = 'spaceContent'>
		<div class = 'spaceText'>
		
			<p>Приветствуем Вас, <b><?= $data['Имя']?></b>. Ваш заказ оформлен и в обработке. Через несколько минут оператор свяжется с вами для уточнения информации.</p>
			
			<?php if (isset($data['Способ_доставки'])) { ?>	
				
				<p>Ваши "вкусняшки" прибудут по указанному адресу. Время ожидания заказа уточните у оператора (приблизительное: около часа).</p>	
					
			<?php } else { ?>
				
				<p>Ваши "вкусняшки" будут ожидать Вас по адресу <b><i>Ул. Пушкина, дом колотушкина, 20005 (Вход напротив остановки)</i></b>, через <b>40</b> минут. Ждем Вас с нетерпением! :)</p>
					
			<?php } ?>	

		</div>	
		<?php if ($cart != 'Корзина пуста') { ?>
			
			<p class = "orderAlarm"><i><u>Если не хотите потерять свой заказ, не перезагружайте / не закрывайте страницу</u></i></p>
			<table>
				<thead>
					<tr>
						<th colspan = "2">Название</th>
						<th>Количество</th>
					</tr>
				</thead>
				
			<?php foreach ($cart['products'] as $id => $value) { ?>
				
				<tr>
					<td><img src = <?= $value['propers']['img'] ?> alt = <?= $value['propers']['name'] ?> width = '70' height = '50'></td>
					<td><?= $value['propers']['name'] ?></td>
					<td><?= $value['count'] ?> шт</td>
				</tr>
			
			<?php } ?>
				<tr>
					<td colspan = "3"><b>Стоимость заказа равна: <?= $cart['cart_cost'] ?> грн</b></td>
				</tr>
			</table>
		<?php } ?>	
	</div>
<?php } ?>