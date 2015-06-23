<?php
if(isset($_POST['email'])) {
	
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
	if(!isset($_POST['e_name']) ||
		!isset($_POST['c_name']) ||
		!isset($_POST['c_date']) ||
		!isset($_POST['g_name']) ||
		!isset($_POST['g_date']) ||
		!isset($_POST['anschrift']) ||
		!isset($_POST['email']) ||
		!isset($_POST['telefon']) ||
		!isset($_POST['mobile']) ||
		!isset($_POST['wann']) ||
		!isset($_POST['woher']) ||
		!isset($_POST['warum'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');		
	}
	
	$c_name = $_POST['c_name'];
	$c_date = $_POST['c_date'];
	$g_name = $_POST['g_name'];
	$g_date = $_POST['g_date'];
	$e_name = $_POST['e_name'];
	$anschrift = $_POST['anschrift'];
	$email_from = $_POST['email'];
	$telefon = $_POST['telefon'];
	$mobile = $_POST['mobile'];
	$wann = $_POST['wann'];
	$warum = $_POST['warum'];
	$woher = $_POST['woher'];
	
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