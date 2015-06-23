<?php
if(isset($_GET['email'])) {
	
	//$email_to = "kinderhausonkeltom@gmx.de";
    $email_to = "seeger@system180.com";
    
	$email_subject = "Anmeldeformular";
	
	
	function died($error) {
		// your error code can go here
		echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_GET['e_name']) ||
		!isset($_GET['c_name']) ||
		!isset($_GET['c_date']) ||
		!isset($_GET['g_name']) ||
		!isset($_GET['g_date']) ||
		!isset($_GET['anschrift']) ||
		!isset($_GET['email']) ||
		!isset($_GET['telefon']) ||
		!isset($_GET['mobile']) ||
		!isset($_GET['wann']) ||
		!isset($_GET['woher']) ||
		!isset($_GET['warum'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');		
	}
	
	$c_name = $_GET['c_name'];
	$c_date = $_GET['c_date'];
	$g_name = $_GET['g_name'];
	$g_date = $_GET['g_date'];
	$e_name = $_GET['e_name'];
	$anschrift = $_GET['anschrift'];
	$email_from = $_GET['email'];
	$telefon = $_GET['telefon'];
	$mobile = $_GET['mobile'];
	$wann = $_GET['wann'];
	$warum = $_GET['warum'];
	$woher = $_GET['woher'];
	
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
  	$error_message .= 'Die Email Adresse ist nicht gültig.<br />';
  }
	$string_exp = "/^[A-Za-z .'-]+$/";
  if(strlen($c_name) < 2) {
  	$error_message .= 'Bitte gib den Namen des Kindes an.<br />';
  }
  if(strlen($c_date) < 2) {
  	$error_message .= 'Bitte gib den Geburtstag des Kindes an.<br />';
  }
 
  if(strlen($e_name) < 3) {
  	$error_message .= 'Bitte gebt die Namen der Eltern an.<br />';
  }
  if(strlen($anschrift) < 3) {
  	$error_message .= 'Bitte gebt eine Wohnanschrift an.<br />';
  }
  if(strlen($telefon) < 6) {
  	$error_message .= 'Bitte gebt eine Telefonnummer an.<br />';
  }
  if(strlen($mobile) < 6) {
  	$error_message .= 'Bitte gebt eine Mobiltelefonnummer an.<br />';
  }
  if(strlen($wann) < 2) {
  	$error_message .= 'Bitte gebt an, wann Ihr Euch den Betreuungsbeginn wünscht.<br />';
  }
  if(strlen($warum) < 6) {
  	$error_message .= 'Bitte gebt an, warum Ihr Euch für das Kinderhaus entschieden habt.<br />';
  }
  if(strlen($woher) < 6) {
  	$error_message .= 'Bitte gebt an, woher Ihr das Kinderhaus kennt.<br />';
  }

  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Form details below.\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "Name: ".clean_string($c_name)."\n";
	$email_message .= "Geburtstag: ".clean_string($c_date)."\n";
	$email_message .= "Geschwister: ".clean_string($g_name)."\n";
	$email_message .= "Geburtstag: ".clean_string($g_date)."\n";
	$email_message .= "Eltern: ".clean_string($e_name)."\n";
	$email_message .= "Anschrift: ".clean_string($anschrift)."\n";
	$email_message .= "E-Mail: ".clean_string($email_from)."\n";
	$email_message .= "Telefon: ".clean_string($telefon)."\n";
	$email_message .= "Mobile: ".clean_string($mobile)."\n";
	$email_message .= "Wann: ".clean_string($wann)."\n";
	$email_message .= "Woher: ".clean_string($woher)."\n";
	$email_message .= "Warum: ".clean_string($warum)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion() . "\r\n";
$headers .= 'Bcc: seeger@system180.com' . "\r\n";

@mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- place your own success html below -->

Danke für Euer Interesse. Wir werden sobald wie möglich mit Euch Kontakt aufnehmen.

<?php
}
die();
?>	