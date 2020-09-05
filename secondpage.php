<?php

if(isset($_POST['cardNumber']) && isset($_POST['cvv'])){
	//connecting php to the database
$conn = new mysqli("localhost","root","","credit-card");

//assign Variables 
$cardNumber = $_POST['cardNumber'];

//encode credit card number 
$ccnum = base64_encode($cardNumber);

//store values
$year = $_POST['expirationYear'];
$month = $_POST['expirationMonth'];
$seccode = $_POST['cvv'];

// date format
$date = $year."-".$month."-01";


if($conn -> connect_error){
	die("Connection Failed:" . $conn -> connect_error);
}
//inserting information into the database
//$sql = "INSERT INTO `card` (`ccnum`, `expdate`, `seccode`) VALUES ('$ccnum', '$date', '$seccode')";
//$conn->query($sql);
$sql = "INSERT INTO card (ccnum, expdate, seccode) VALUES ('$ccnum', '$date', '$seccode')";
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

 $stmt = $conn->prepare("SELECT * FROM `card` ORDER BY `#` DESC LIMIT 1");
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()){
		$lastId = $row['#'];
		$lastId++;
	}
	$conn=null;
}

?>

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
	<div class="mailTwo">
		<!-- Title-->
		<h3 >You have successfully entred your credit card details </h3>

		<!-- Second Title -->
		<div>
			<h4>Debit/Credit Card
				<img class= "imgageCard" src="image/masterCard.png" alt=“masterCard logo”>
				<strong>Your credit card number ends in</strong>
				<?php

				//connecting php to the database
				$conn = new mysqli("localhost","root","","credit-card");

				if ($result = $conn -> query("SELECT * FROM card")) {
					while ($row = $result -> fetch_row()) {
				$cardNumber = $row[1];
				}
				//decoding card number
				$showCardNumber = base64_decode($cardNumber);
				//take the last 4 digits of the card number
				$lastFourNumbers = substr ($showCardNumber,-4);

				// print to the screen
				 echo '<span style="font-size:22px">' . "**** **** **** ". $lastFourNumbers .'</span>'; 
				$result -> free_result();
				}
				$conn=null;
			?>
			</h4>
		</div>
		<div id="mainBackgroundTwo">
		</div>
	</div>
	
</body>
</html>

  
