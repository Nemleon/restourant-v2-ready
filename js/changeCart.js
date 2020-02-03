$('.button').click(function() {

        event.preventDefault();

	$.post(
        
		'/cart',
        
        {	
			
            id: $(this).attr('data-id'),
			action: $(this).attr('data-action'),
			
        },
		
		function createCart(result) {
					
			if (result == 'Корзина пуста') {
				
				$('.spaceCart').html('<p>Корзина пуста</p><p><a href="/">Вернуться в меню и сделать заказ</a></p>');
				$(".order").hide();
				return false;
				
			}
			
			let data = JSON.parse(result);
			
			//Выделение id для последущего использования в условии
			let param = (this['data']);
			let arr = param.replace(/=/gi, '&');
			arr = arr.split('&'); //Под arr['1'] находится id товара

			if (typeof data['products'][arr['1']] !== "undefined") {	

				for(let id in data['products']) {
					
					let productId = data['products'][id]['id'];
					let productCount = data['products'][id]['count'];

					$('#count'+productId).html(productCount + ' шт');
				
				}
				
				$('#cartCost').html('<b>Стоимость равна ' + data['cart_cost'] + ' грн</b>');
				
			} else if (typeof data['products'][arr['1']] === "undefined") {
				
				let e = document.getElementById("cart"+arr['1']);
				
				$('#cartCost').html('<b>Стоимость равна ' + data['cart_cost'] + ' грн</b>');
				e.remove();
				
			}
        }	
	);
});