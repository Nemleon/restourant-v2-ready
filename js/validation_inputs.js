let inputs = document.querySelectorAll('input[data-rule]');

for (let input of inputs) {
	
	input.addEventListener('keypress', validate);
	input.addEventListener('blur', validate);
	input.addEventListener('click', validate);

}

 function validate() {

	let rule = this.dataset.rule;
	let value = this.value;
	let check;

	switch (rule) {
		
		case 'name':
		
			firstNameCheck = /^[a-zA-Zа-яёА-ЯЁ \-]{3,25}$/.test(value);
			if (firstNameCheck){
				
				this.classList.remove('invalid');
				this.classList.add('valid');
				name_error.textContent = null;
				
			} else {
				
				this.classList.remove('valid');
				this.classList.add('invalid');
				name_error.textContent = 'Введите имя *';
				
			}
		
		break;
		
		case 'email':
		
			firstNameCheck = /^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i.test(value);
			if (firstNameCheck){
				
				this.classList.remove('invalid');
				this.classList.add('valid');
				email_error.textContent = null;
				
			} else {
				
				this.classList.remove('valid');
				this.classList.add('invalid');
				email_error.textContent = 'Введите имя *';
				
			}
		
		break;
	
		case 'number':
		
			numberCheck = /^(\+)?(\(\d{2,3}\) ?\d|\d)(([ \-]?\d)|( ?\(\d{2,3}\) ?)){5,12}\d$/.test(value);
			if (numberCheck){
		
				fNumber_error.textContent = null;
				this.classList.remove('invalid');
				this.classList.add('valid');
			
			
			} else {
		
				this.classList.remove('valid');
				this.classList.add('invalid');
				fNumber_error.textContent = 'Введен неправильный номер телефона';
		
			}
			
		break;

		case 'street':
		
			streetCheck = /^[a-zA-Zа-яёА-ЯЁ0-9]{2,25}$/.test(value);		
			if (streetCheck){
		
				street_error.textContent = null;
				this.classList.remove('invalid');
				this.classList.add('valid');
			
			
			} else {
		
				this.classList.remove('valid');
				this.classList.add('invalid');
				street_error.textContent = 'Введите название улицы';
		
			}
			
		break;

		case 'house':
		
			houseCheck = /^[a-zA-Zа-яёА-ЯЁ0-9]{1,3}$/.test(value);
			if (houseCheck){
		
				house_error.textContent = null;
				this.classList.remove('invalid');
				this.classList.add('valid');
			
			
			} else {
		
				this.classList.remove('valid');
				this.classList.add('invalid');
				house_error.textContent = 'Введите номер дома';	
		
			}
			
		break;

		case 'entrance':
			
			entranceCheck = /^[0-9]{1,2}$|^$/.test(value);
			if (entranceCheck){
		
				this.classList.remove('invalid');
				this.classList.add('valid');
				entranceError.textContent = null;
			
			
			} else {
				
				this.classList.remove('valid');
				this.classList.add('invalid');
				entranceError.textContent = 'Введите номер подъезда';
		
			}
			
		break;
		  
		case 'apartment':
		
			apartmentCheck = /^[0-9]{1,5}$/.test(value);
			if (apartmentCheck){

				this.classList.remove('invalid');
				this.classList.add('valid');
				apartmentError.textContent = null;
			
			
			} else {
				
				this.classList.remove('valid');
				this.classList.add('invalid');
				apartmentError.textContent = 'Введите номер квартиры';
				
			}
			
		break;
	}
}				 