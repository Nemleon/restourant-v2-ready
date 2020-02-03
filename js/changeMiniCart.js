$('button').click(function() {
	
	if ($(this).attr('class').includes('miniCartAdd') || $(this).attr('class').includes('miniCartDel')) {
		
		window.buttId = $(this).attr('id');
		
		$.post(
			
			'/cart',
			
			{				
				id: $(this).attr('data-id'),
				action: $(this).attr('data-action'),
				propers:	
				{
					name: $(this).attr('data-name'),
					cost: $(this).attr('data-cost'),
					img: $(this).attr('data-img'),
				}	
			},
			
			function createCart(result) {
				
				if (result === 'Корзина пуста' || result === '{"products":[],"products_incart":0,"cart_cost":0}') {
					
					$('.spaceCart').html('<p>Корзина пуста</p>');
					$('.counter').hide();
					return false;
					
				}
				
				let data = JSON.parse(result);
				
				let out = '';
				
				out += '<p class = "orderAlarm"><b>*Изменить количество порций Вы сможете на странице заказа</b></p>';
				out += '<p><b>Ваш выбор:</b></p>';
				out += '<table>';
					
				for(let id in data['products']) {
					
					$('.counter').show();
					
					let productId = data['products'][id]['id']
					let productName = data['products'][id]['propers']['name'];
					let productImg = data['products'][id]['propers']['img'];
					

					out += '<tr id = "miniCart' + productId + '"><td><button class = "button" onclick = "deleteItemFrCart(\'' + productId + '\', \'deleteItem\'); changeDiv(\'del' + productId + '\', \'add' + productId + '\', \'' + productId + '\');">';
					out += '<span class = "cartBut"><img src = "images/cross.png" alt = "X" width = "25"  height = "25"></span>';
					out += '</button></td>';
					out += '<td><img src = "' + productImg + '" alt = "' + productName + '" width = "50" height = "50"></td>';
					out += '<td>' + productName + '</td></tr>';

				}
				
				
				out += '<td colspan = "3" id = "cartCost"><b>Стоимость равна ' + data['cart_cost'] + ' грн</b></td>';
				out += '</table>'
				out += '<div class = "linkOrangeDiv"><a href="/cart" class = "linkOrange">Перейти к заказу</a></div>';
				
				$('.spaceCart').html(out);
				
				$('#cartCost').html('<b>Стоимость равна: '  + data["cart_cost"] +  ' грн</b>');
					
				$('.counter').html(data['products_incart']);
			
			}
		);
		
	} else {
		
		return false;
		
	}
});

function deleteItemFrCart (getId, getAction) {
		
		$.post(
			
			'/cart',
			
			{				
				id: getId,
				action: getAction
	
			},
			
			function createCart(result) {			
				
				if (result === 'Корзина пуста' || result === '{"products":[],"products_incart":0,"cart_cost":0}') {
					
					$('.spaceCart').html('<p>Корзина пуста</p>');
					$('.counter').hide();
					return false;
					
				} 

				
				//Выделение id для последущего использования в условии
				let param = (this['data']);
				let arr = param.replace(/=/gi, '&');
				arr = arr.split('&'); //Под arr['1'] находится id товара
				
				let data = JSON.parse(result);

				if (typeof data['products'][arr['1']] === "undefined") {
				
					let e = document.getElementById("miniCart"+arr['1']);
				
					$('#cartCost').html('<b>Стоимость равна: '  + data["cart_cost"] +  ' грн</b>');
					e.remove();
					
					$('.counter').html(data['products_incart']);
				
				}		
			}
		);
}