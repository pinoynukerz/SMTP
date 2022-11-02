<?php 
//SMTP MAIL

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
 if(isset($_POST['submit'])){
     
    $datetoday     =  date("l jS F Y g:ia"); 
     
    if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }

    echo '<div style="margin-top:45px margin-left:40px;margin-right:auto;">';

    echo $_POST['fullname'].''.$_POST['email'].''.$_POST['subject'].''.$_POST['message'];
    
    echo '</div>';
   
    $name        = $_POST['fullname'];
    $email       = $_POST['email'];
    $subject     = $_POST['subject'];
    $messagepost = $_POST['message'];
     
    $message = "<div style=\"text-align:center;background-color:#5a0000;padding:16px 0\"><div class=\"adM\">
    </div><span style=\"color: white;font-size: 18px;font-weight: 900;\">AUDIOPHILE</span>
</div><div style=\"background-color:#f6f6f6;padding:30px\"><div style=\"margin:0 auto;width:620px;background-color:#fff;border:1px solid #eee;padding:30px\">
    <table width=\"100%\" cellpadding=\"4\" cellspacing=\"0\" style=\"border-collapse:collapse;font-size:12px;font-family:verdana;\" border=\"1\" bordercolor=\"#CCCCC\">
    <tr><td bgcolor=\"#f4f4f4\" align=\"right\">Date</td><td >$datetoday</td></tr>
    <tr><td width=\"150\" bgcolor=\"#f4f4f4\" align=\"right\">Name</td><td width=\"450\"> $name </td></tr>
    <tr><td bgcolor=\"#f4f4f4\" align=\"right\">Email</td><td > $email </td></tr>
    <tr><td bgcolor=\"#f4f4f4\" align=\"right\">Subject</td><td >$subject </td></tr>
    <tr><td bgcolor=\"#f4f4f4\" align=\"right\">IP Address</td><td > $ip_address </td></tr>
    <tr><td bgcolor=\"#f4f4f4\" colspan=\"2\"><FONT SIZE=\"+1\" >Message sent @ Stem Ecosystem Landing Page</FONT></td></tr>
    <tr><td bgcolor=\"#f4f4f4\" valign=\"top\" align=\"right\" height=\"150\">Message</td><td valign=\"top\" > $messagepost</td></tr>
    </table></div></div><div style=\"padding-top:30px;text-align:center;padding-bottom:30px;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif\">
    <div style=\"width:640px;background-color:#ffffff;margin:0 auto\">
    <p style=\"margin:0 0 10px\">Copyright © 2022 , All rights reserved.</p>
    <p style=\"margin:0 0 10px\">The Philippines largest distributor of professional audio equipment and musical instruments. <a style=\"color:#ef0000;text-decoration:none\" href=\"https://audiophile.ph\" target=\"_blank\">Audiophile.Ph</a></p>
    <div class=\"yj6qo\"></div></div><div class=\"adL\"></div></div>"; 
     

    $sender       = 'email@hotmail.com';
    $senderName   = $name;
    $recipient    = 'email@gmail.com';
    $usernameSmtp = 'XXXXXXX'; 
    $passwordSmtp = 'XXXXXXX';
    $host         = 'email-smtp.us-east-1.amazonaws.com';
    $port         = 465;
     

     
    $subject  = $subject;
    $bodyText = $email;
    $bodyHtml = $message;
     
     
    $mail = new PHPMailer(true);

try {
    // Specify the SMTP settings.
    $mail->isSMTP(true);
    $mail->setFrom($sender, $senderName);
    $mail->Username   = $usernameSmtp;
    $mail->Password   = $passwordSmtp;
    $mail->Host       = $host;
    $mail->Port       = $port;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'ssl';
    
    $mail->addAddress($recipient);
    
    $mail->isHTML(true);
    $mail->Subject    = $subject;
    $mail->Body       = $bodyHtml;
    $mail->AltBody    = $bodyText;
    
    $mail->Send();
    
    echo "Email sent!" , PHP_EOL;
} catch (phpmailerException $e) {
    echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
} catch (Exception $e) {
    echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
}
     
    

 }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Contact Us | Form Validation | AWS | SMTP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	
	<div class="header">
		<h2>Contact us</h2>
		 <p>Form Validation | AWS | SMTP</p>
	</div>
    
<form id="form" class="form">
		<div class="form-control">
			<label for="username">Full Name</label>
			<input type="text" placeholder="Full Name" id="fullname" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Email</label>
			<input type="email" placeholder="Email" id="email" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		
		<div class="form-control">
			<label for="username">Subject</label>
			<input type="subject" placeholder="Subject" id="subject"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Message</label><br>
			<textarea name="enquiry" rows="10" id="enquiry"></textarea>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<button>Submit</button>
	</form>
</div>
 
    
 <script  src="./script.js"></script>

</body>
</html>
