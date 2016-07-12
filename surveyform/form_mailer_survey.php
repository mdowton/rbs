<?php
	$recipients = 'crockfordcarlisle@gmail.com, sj@roofandbuildingservice.com.au';
	$email = 'surveyform@roofandbuilding.com.au';

	$errorMessage = NULL;
			
	if ($_POST['Name'] == NULL)
		$errorMessage .= 'Please enter your name.<br />';
		
	if ($_POST['Phone'] == NULL)
		$errorMessage .= 'Please enter your phone number.<br />';
        
    // end of name verification
		
	if ($_POST['How_did_you_hear_about_us'] == 'Make your selection' )
		$errorMessage .= 'Please select how you heard about us.<br />';
        
    if ($_POST['Why_did_you_choose_us'] == 'Make your selection' )
		$errorMessage .= 'Please select why you chose us.<br />';
	
    if ($_POST['charity'] == 'Make your selection')
        $errorMessage .= 'Please select a charity to dontate to.<br />';
        
	if ($errorMessage != NULL) {
		require('index.php');
		exit;
	}
	
	foreach($_POST as $key => $item) {
		if ($key != 'recipient' and $key != 'subject' and $key != 'redirect' and $key != 'Submit' and $key != 'submit_x' and $key != 'submit_y' and $key != 'campaign') {
			if (isset($item) and $item != NULL)
				$message .= str_replace('_', ' ', stripslashes($key)).':     '.stripslashes($item)."\n\n";
		}
	}
	$result = @mail($recipients, $_POST['subject'], $message, 'From: '.$email);
	if ($result) {
		header('Location: '.$_POST['redirect']);
		exit;
	} else {
		echo 'There was an error in sending the email. Please contact <a href="mailto:'.$email.'">'.$email.'</a> for assistance.', LF;
	}
?> 