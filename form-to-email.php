<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];
?>

<!-- compose email message  -->

<?php
	$email_from = '8b3ca816d17c2b6591f9bd4e6257268a';

	$email_subject = "New Form submission";

	$email_body = "You have received a new message from the user $name.\n".
                            "Here is the message:\n $message".

  

// <!-- send the email  -->



  $to = "8b3ca816d17c2b6591f9bd4e6257268a";

  $headers = "From: $email_from \r\n";

  $headers .= "Reply-To: $visitor_email \r\n";

  mail($to,$email_subject,$email_body,$headers);




// <!-- securing from global injection  -->


function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>

<?php
/* Mailhandler for the main email address */
header ("Location: mailto:8b3ca816d17c2b6591f9bd4e6257268a");
exit();
?>