<?php

$type = $_GET["type"];
$currency = $_GET["currency"];
if($currency == "") {
	$currency == "USD";
}
$amount = $_GET["amount"];
if($amount == "") {
	$amount == "1.00";
}
$title = $_GET["title"];
if($title == "") {
	$title == "Donation using PayACoffee.com";
}

if($type == "paypal") { 

	$email = $_GET["email"];

	if(strpos($email, "@") !== false) {
		$payacoffeeURL = "https://www.paypal.com/cgi-bin/webscr?" . "business=" . $email . "&cmd=_xclick" . "&currency_code=" . $currency . "&amount=" . $amount . "&item_name=" . $title;
		header("Location: " . $payacoffeeURL);
	}

}

if($type == "bitcoin") {

	$bitcoin = $_GET["bitcoin"];

	if(strlen($bitcoin)>=26 && strlen($bitcoin)<=34) {
		$payacoffeeURL = "bitcoin:" . $bitcoin . "?amount=" . number_format($amount/425, 8, '.', ' ') . "&label=" . $title;
		echo $payacoffeeURL;
		header("Location: " . $payacoffeeURL);
	}

}	

?>
