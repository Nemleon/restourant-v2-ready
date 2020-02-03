<?php $title = "Обратная связь"; ?>
<h1>Обратная связь</h1>
<div class = 'articles'><h2>Здесь Вы можете оставить отзыв о нашем ресторане! Понравилось Вам или нет, что именно, ну или просто отблагодарить нас! :D</h2></div>
<div class = 'spaceContent'>

<?php if (isset($data['send']) && $data['send'] == 'Отправлено') { ?>

	<p class = "feedbackTy"><b>Сообщение успешно отпралено! Спасибо за отзыв, <?= $data['name'] ?>! :)</b></p>
	<p><a href="/">Вернуться на главную</a></p>
	
<?php } elseif ((isset($data['send']) && $data['send'] != 'Отправлено')) { ?>

	<p class = "feedbackErr"><b>Приветствуем Вас, <?= $data['name']?>! <?= $data['send'] ?></b></p>
	
<?php } else { ?>

	<?php if(isset($data) && !isset($data['send'])) { ?>
		<div class = 'formErrors'>
		
			<p>Упс! Кажется Вы не заполнили / ввели неверные данные в поля:</p>
			<ul>
				<li> <?= implode('</li><li>', $data); ?> </li>
			</ul>
			<p>Просим исправить :)</p>
		</div>	
		
	<?php } ?>
	
	<form action='/feedback/sendfeedback' method="POST" id="form">
		<p><b>Ваше имя</b></p>
			<div id = "name_error"></div>
			<input data-rule="name" class = 'textInput' placeholder="Представьтесь" name="Имя" type="text" >
		<p><b>Ваш Email</b></p>
			<div id = "email_error"></div>
			<input data-rule="email" class = 'textInput' placeholder="Укажите почту" name="Email" type="text" >
		<p><b>Сообщение</b></p>
			<textarea maxlength = '500'  name="Сообщение"></textarea>
		<div class = 'positioningBut'>
			<input class = 'buttonSend' value="Отправить" type="submit">
			<div class = 'space'></div>
			<input class = 'buttonDelete' type="reset" value="Очистить">
		</div>	
		<p><a href="/">Вернуться на главную</a></p>
	</form>
	
<?php } ?>	
</div>
