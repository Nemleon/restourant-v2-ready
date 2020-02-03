<h1>Заказ</h1>
<?php if(isset($data)) { //$data - содержит ошибки ?>
	<div class = 'formErrors'>
		<p>Упс! Кажется Вы не заполнили / ввели неверные данные в поля:</p>
		<ul>
			<li> <?= implode('</li><li>', $data); ?> </li>
		</ul>
		<p>Просим исправить :)</p>
	</div>
<?php } ?>
<div class = 'articles'><h2>Корзина</h2></div>
<div class = 'spaceContent'>
	<div class = 'spaceCart'>
		<?php if ($cart != 'Корзина пуста') { ?>
			<p><b>Дополните заказ:</b></p>
			<table>
				<?php foreach ($cart['products'] as $id => $value) { ?>
					<tr id = "cart<?= $id ?>">
						<td>
							<button class = "button" data-action = 'deleteItem' data-id = '<?= $id ?>'>
								<span class = "cartBut"><img class = "cartButtImg" src = 'images/cross.png' alt = 'X'></span>
							</button>
						</td>
						<td><img src = <?= $value['propers']['img'] ?> alt = <?= $value['propers']['name'] ?> width = '50' height = '50'></td>
						<td><?= $value['propers']['name'] ?></td>
						<td><?= $value['propers']['cost']?></br>(грн/шт)</td>
						<td>
							<button class = 'button' data-action = 'minusItem' data-id = '<?= $id ?>'>
								<span class = "cartBut"><img class = "cartButtImg" src = 'images/minus.png' alt = 'X'></span>
							</button>
						</td>
						<td id = "count<?= $id ?>"><?= $value['count']?> шт</td>
						<td>
							<button class = "button" data-action = 'plusItem' data-id = '<?= $id ?>'>
								<span class = "cartBut"><img class = "cartButtImg" src = 'images/plus.png' alt = 'X'></span>
							</button>
						</td>	
					</tr>
				<?php } ?>
			</table>
			<p id = "cartCost"><b>Стоимость равна <?= $cart['cart_cost'] ?> грн</b></p>
		<?php } else { ?>
			<p>Корзина пуста</p>
			<p><a href="/">Вернуться в меню и сделать заказ</a></p>
		<?php } ?>
	</div>
</div>	
<?php if ($cart != 'Корзина пуста') { ?>
	<div class = "order">
		<div class = 'articles'><h2>Заполните всю информацию ниже</h2></div>
		<div class = 'spaceContent'>
			
			<form action = '/order' method = 'POST'>
				<p><b>Имя</b></p>
				<div>
					<div id = "name_error"></div>
					<input  type="text" data-rule="name" class = "textInput" name="Имя" id="name" placeholder="Алексей">
				</div>
				<p><b>Номер телефона</b></p>
				<div>
					<div id="fNumber_error"></div>
					<input class = 'textInput' type="text" data-rule="number" id="number" name="Номер телефона" placeholder="0995554144">
				</div>	
					
				<!--Выбор формы доставки-->
				<div id='delv_error'></div>
				<p id='delvs'><b>Способ доставки</b></p>
				<div class="deliverySpace">
					<input data-rule="delivery" onClick="change_visibility ('r0', 'r1')"
					type="radio" name="Способ доставки" id="delv" value="yes">
					<label for="delv">Доставка</label>
					<div class = 'space'></div>
					<input data-rule="delivery" onClick="change_visibility ('r1', 'r0')"
					type="radio" name="Способ доставки" id="self" value="no">
					<label for="self">Самовывоз</label>
				</div>
					
				<!--Доставка на дом-->
				<div id="r1" style="display:none">
					<p><h4>Введите информацию, как показанно в примере</h4></p>
					<div><p>Название улицы</p>
						<div id="street_error"></div>
						<input class = 'textInput' type="text" data-rule="street" id="street" name="Название улицы" placeholder="Колотушкина">
					</div>
					<div><p>Номер дома</p>
						<div id="house_error"></div>
						<input class = 'textInput' type="text" data-rule="house" id="house" name="Номер дома" placeholder="13В">
					</div>
					<div><p>Номер квартиры</p>
						<div id="apartmentError"></div>
						<input class = 'textInput' type="text" data-rule="apartment" id="apartment" name="Номер квартиры" placeholder="111">
					</div>	
					<div><p>Номер подъезда/парадной</br> (Если такого нет, то просим написать ноль)</p>
						<div id="entranceError"></div>
						<input class = 'textInput' type="text" data-rule="entrance" id="entrance" name="Номер подъезда/парадной" placeholder="5">
					</div>
					<div class = 'positioningBut'>
						<input class = 'buttonSend' type="submit" value="Заказать">
						<div class = 'space'></div>
						<input class = 'buttonDelete' type="reset" value="Очистить">
					</div>
				</div>
				<div id="r0" style="display:none">
					<p>Выбран самовывоз</p>
					<div class = 'positioningBut'>
						<input class = 'buttonSend' type="submit" value="Заказать">
						<div class = 'space'></div>
						<input class = 'buttonDelete' type="reset" value="Очистить">
					</div>		
				</div>
			</form>
		</div>
	</div>	
<?php } ?>
<script type="text/javascript" src="js/changeCart.js"></script>