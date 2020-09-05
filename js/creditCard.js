window.addEventListener('DOMContentLoaded', () => {
	document.querySelector('input[name="cardNumber"]').focus()
	
	const creditCardInput = () => {
		//checking for card input.
		const creditCardNumbers = document.getElementsByClassName('cardNumber').value=="";
		const creditCardInput = /^(?:5[1-5][0-9]{14})$/;

			if(creditCardNumbers.match(creditCardInput))
			{
				return true;
			}
			else
			{
				alert("Enter a valid Mastercard number!");
				return false;
			}
		}

		const cvvInput = () => {
		//checking for cvv input.
		const securityCode = document.getElementsByClassName('cvv').value=="";
		const securityCode = /^(?:[0-9]{3})$/;
		
			if (securityCode.match(securityCode)) {
				return true;
			} else {
				alert("Not a valid Security number!");
				return false;
			}
		}
		//
		document.querySelector('#creditCardForm').addEventListener('continue', (event) => {
		event.preventDefault();
			if (creditCardInput() && cvvInput()) {
			event.target.continue();
		}
	}

}





