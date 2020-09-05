<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--width of website-->
	<meta name ="viewport" content="width=device-width">
	<title>JavaScript form validation - checking non-empty</title>
<!--Linking css to html -->
<link rel='stylesheet' href='./css/creditcard.css' type='text/css' />
</head>

<body onload='document.form1.text1.focus()'>
	<div class="mail">
		<!-- Title-->
		<h2>Payment Options </h2>
	
			<!-- Second Title -->
			<div>
				<h4>Debit/Credit Card
					<img class= "imgCard" src="image/masterCard.png" alt=“masterCard logo”>
				</h4>
			</div>

			<!-- Main Box-->
			<div id="mainBackground">
				<h5>
					<form onsubmit="cardnumber(document.form1.cardNumber);" name='form1' id="creditCardForm" action="secondpage.php" method="post">
						<!-- Card Number Div -->
						<div class="creditCard">
							<label class="Text" for="cardNumber">Card Number</label>
							<input type="cardNumber" class="cardNumber" name="cardNumber" maxlength="16">
						</div>
						<!-- expirationDate Div -->
						<div class="expirationDate">
							<label class="Text" for="expireMonth">Expiration Date</
							</label>
							<select class="month" name="expirationMonth" required id="expireMonth">
								<!-- Select Month Options -->
								<option hidden value="">Month</option>
								<option>01</option>
								<option>02</option>
								<option>03</option>
								<option>04</option>
								<option>05</option>
								<option>06</option>
								<option>07</option>
								<option>08</option>
								<option>09</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
							</select>
							<!-- Select Year Options -->
							<select class="year" name="expirationYear" required id="expireYear">					<option hidden value="">Year</option>
								<option>2020</option>
								<option>2021</option>
								<option>2022</option>
								<option>2023</option>
								<option>2024</option>
								<option>2025</option>
								<option>2026</option>
								<option>2027</option>
								<option>2028</option>
								<option>2029</option>
							</select>               			
						</div>
						<!-- Security Code Div -->
						<div class="securityCode">
							<label> Security Code</label>
							<input type='cvv' class="cvv" name='cvv' maxlength="4"/>
						</div>
							<p>(3-4 digit code normally on the back of your card)</p>
						<!-- Button -->
						<div class="continueButton">
							<button type="submit" name="continue">Continue
							</button>
						</div>
					</form>
						
				</h5>
			</div>
	</div>		
	<script>
	function cardnumber(inputtxt)
{
  var cardno = /^(?:5[1-5][0-9]{14})$/;
  if(inputtxt.value.match(cardno))
        {
      return true;
        }
      else
        {
		alert("Not a valid Master credit card number!");
		event.preventDefault();
        return false;
        }
}</script>
	<!--
<script src="credit-card-master-validation.js"></script>
-->
</body>
</html>