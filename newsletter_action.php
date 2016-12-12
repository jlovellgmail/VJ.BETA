
<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	$to = "jay@virgiljames.com, lucia@virgiljames.com, rross@mcgoodwin.com";
	$subject = "Virgil James Newsletter Request (.net site)";

	$name = $_POST["name"];
	$email = $_POST["email"];
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: <" . $email . ">\r\n";
    
	$message = "Name: " . $name . " Email: " . $email;
	mail($to, $subject, $message, $headers);
	
	echo "<p class='textGrey ital block f-16px' style='text-align:center;'>Welcome to Virgil James, it's good to have you!</p>";
?>