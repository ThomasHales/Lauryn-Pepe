<?php

    $webmaster_email = "hannm@uwindsor.ca";

    $feedback_page = "contact.html";
    $error_page = "error_message.html";
    $thankyou_page = "thank_you.html";

    $email_address = $_REQUEST['email_address'] ;
    $comments = $_REQUEST['comments'] ;
    $first_name = $_REQUEST['first_name'] ;
    $msg = "First Name: " . $first_name . "\r\n" . "Email: " . $email_address . "\r\n" . "Comments: " . $comments ;

    function isInjected($str) {
	    $injections = array('(\n+)','(\r+)','(\t+)','(%0A+)','(%0D+)','(%08+)','(%09+)');
	    $inject = join('|', $injections);
	    $inject = "/$inject/i";
	    if(preg_match($inject,$str)) {
		    return true;
	    }
	    else {
		    return false;
	    }
    }

    if (!isset($_REQUEST['email_address'])) {
        header( "Location: $feedback_page" );
    }
    else if (empty($first_name) || empty($email_address)) {
        header( "Location: $error_page" );
    }
    else if ( isInjected($email_address) || isInjected($first_name)  || isInjected($comments) ) {
        header( "Location: $error_page" );
    }
    else {
        mail( "$webmaster_email", "Feedback Form Results", $msg );
        header( "Location: $thankyou_page" );
    }
?>